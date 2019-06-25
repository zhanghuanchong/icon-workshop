<template>
    <div class="vdr" id="vdr"
         :class="{ draggable: draggable && !disable, resizable: resizable && !disable, active , dragging, resizing}"
         tabindex="0" :style="style">
        <!-- 如果可改变大小为真 -->
        <template v-if="resizable && !disable">
            <!-- 待优化 -->
            <div class="handle handle-ml" v-if="resizable === true || resizable === 1 || resizable === 2"
                 @mousedown.left.stop.prevent="handleDown('ml')"></div>
            <div class="handle handle-mr" v-if="resizable === true || resizable === 1 || resizable === 2"
                 @mousedown.left.stop.prevent="handleDown('mr')"></div>
            <div class="handle handle-tm" v-if="resizable === true || resizable === 1 || resizable === 3"
                 @mousedown.left.stop.prevent="handleDown('tm')"></div>
            <div class="handle handle-bm" v-if="resizable === true || resizable === 1 || resizable === 3"
                 @mousedown.left.stop.prevent="handleDown('bm')"></div>
        </template>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        replace: true,
        name: 'ImageDeformation',
        props: {
            draggable: { // 是否可被拖动
                type: [Boolean, Number],
                default: true
            },
            resizable: { // 是否可改变大小
                type: [Boolean, Number],
                default: true
            },
            resizaratio: { // 开启等比缩放
                type: Boolean,
                default: false
            },
            w: { // 宽度
                type: Number,
                default: 200,
            },
            h: { // 高度
                type: Number,
                default: 200,
            },
            minw: { // 最小宽度
                type: Number,
                default: 1,
            },
            minh: { // 最小高度
                type: Number,
                default: 1,
            },
            x: { // 距父元素左上角X轴偏移量
                type: Number,
                default: 0
            },
            y: { // 距父元素左上角Y轴偏移量
                type: Number,
                default: 0
            },
            scale: {
                type: Number,
                default: 1
            },
            zoom: {
                type: Number,
                default: 1
            },
            grid: {
                type: Array,
                default: () => {
                    return [1, 1]
                }
            },
            restrain: { // 约束组件大小
                type: Number,
                default: 0
            },
            parent: {
                type: Boolean,
                default: false
            },
            disable: {
                type: Boolean,
                default: false
            },
            // 额外的拖动元素
            resizableIcon: {
                type: String,
                default: ''
            },
            // 允许拖动的元素ID
            dragElement: {
                type: String,
                default: ''
            }
        },
        data () {
            return {
                top: this.y,
                left: this.x,
                width: this.w,
                height: this.h,
                resizing: false,
                dragging: false,
                active: false,
                handle: null,
                parentX: 0,
                parentW: 9999,
                parentY: 0,
                parentH: 9999,
                mouseX: 0,
                mouseY: 0,
                lastMouseX: 0,
                lastMouseY: 0,
                mouseOffX: 0,
                mouseOffY: 0,
                elmX: 0,
                elmY: 0,
                elmW: 0,
                elmH: 0,
                zIndex: this.rezIndex()
            }
        },
        mounted () {
            // 注册拖动事件
            if (this.dragElement === '') {
                this.$el.onmousedown = this.elmDown
            } else {
                const dragDom = this.$el.getElementsByClassName(this.dragElement)[0];
                dragDom.onmousedown = this.elmDown
            }
            // 注册改变大小icon
            // 待修复，可能有问题
            if (this.resizableIcon !== '') {
                const dragDom = this.$el.getElementsByClassName(this.resizableIcon)[0];
                dragDom.onmousedown = () => {
                    this.handleDown('br')
                }
            }

            // 初始化控件宽高
            if (this.minw > this.w) this.width = this.minw;
            if (this.minh > this.h) this.height = this.minh;
            // 判断是否只能在父级元素中拖动
            if (this.parent) this.calculationParent();
            // 判断浏览器是否支持passive
            try {
                Object.defineProperty({}, 'passive', {
                    get: function () {
                        this.passiveSupported = true
                    }
                })
            } catch (err) {
            }
            this.$emit('resizing', this.left, this.top, this.width, this.height)
        },
        methods: {
            rezIndex() {
                window.__deformation_zIndex = this.runNum(window.__deformation_zIndex) + 1;
                return window.__deformation_zIndex;
            },
            runNum(str, fixed) {
                let _s = Number(str);
                if (_s + "" === "NaN") {
                    _s = 0;
                }
                if (/^[0-9]*[1-9][0-9]*$/.test(fixed)) {
                    _s = _s.toFixed(fixed);
                    let rs = _s.indexOf('.');
                    if (rs < 0) {
                        _s += ".";
                        for (let i = 0; i < fixed; i++) {
                            _s += "0";
                        }
                    }
                }
                return _s;
            },
            calculationParent () {
                this.parentW = parseInt(this.$el.parentNode.clientWidth, 10);
                this.parentH = parseInt(this.$el.parentNode.clientHeight, 10);
                if (this.w > this.parentW) this.width = this.parentW;
                if (this.h > this.parentH) this.height = this.parentH;
                if ((this.x + this.width) > this.parentW) this.left = this.parentW - this.width;
                if ((this.y + this.height) > this.parentH) this.top = this.parentH - this.height
            },
            elmDown (e) {
                // 组件被按下事件
                this.zIndex = this.rezIndex();
                // 阻止默认事件
                e.preventDefault();
                const passiveSupported = this.passiveSupported;
                // 判断是否支持拖动
                if (this.disable || !this.draggable) return;
                const target = e.target || e.srcElement;
                // 确保事件发生在组件内部
                if (this.$el.contains(target)) {
                    if (!this.active) {
                        this.lastMouseX = e.pageX || e.clientX + document.documentElement.scrollLeft;
                        this.lastMouseY = e.pageY || e.clientY + document.documentElement.scrollTop;
                        document.documentElement.addEventListener('mousemove', this.handleMove, passiveSupported ? {passive: true} : true);
                        document.documentElement.addEventListener('mousedown', this.deselect, passiveSupported ? {passive: true} : true);
                        document.documentElement.addEventListener('mouseup', this.handleUp, passiveSupported ? {passive: true} : true);
                        this.active = true;
                        this.$emit('activated')
                    }
                    this.elmX = parseInt(this.left);
                    this.elmY = parseInt(this.top);
                    this.elmW = this.$el.offsetWidth || this.$el.clientWidth;
                    this.elmH = this.$el.offsetHeight || this.$el.clientHeight;
                    this.dragging = true
                }
                this.$emit('dragdown', e)
            },
            deselect (e) { // 取消选择事件
                this.mouseX = e.pageX || e.clientX + document.documentElement.scrollLeft;
                this.mouseY = e.pageY || e.clientY + document.documentElement.scrollTop;
                this.lastMouseX = this.mouseX;
                this.lastMouseY = this.mouseY;
                const target = e.target || e.srcElement;
                const regex = new RegExp('handle-([trmbl]{2})', '');
                if (!this.$el.contains(target) && !regex.test(target.className)) {
                    if (this.active) {
                        document.documentElement.removeEventListener('mousemove', this.handleMove, true);
                        document.documentElement.removeEventListener('mousedown', this.deselect, true);
                        document.documentElement.removeEventListener('mouseup', this.handleUp, true);
                        this.active = false;
                        this.$emit('deactivated')
                    }
                }
            },
            handleDown (handle) { // 拖动点按下事件
                // 将handle设置为当前元素
                this.handle = handle;
                this.resizing = true
            },
            handleMove (e) {
                // 鼠标在页面上的坐标
                this.mouseX = e.pageX || e.clientX + document.documentElement.scrollLeft;
                this.mouseY = e.pageY || e.clientY + document.documentElement.scrollTop;
                // diffX =  当前鼠标位置 - 上次鼠标位置 + ？？
                let diffX = (this.mouseX - this.lastMouseX + this.mouseOffX) / this.zoom;
                let diffY = (this.mouseY - this.lastMouseY + this.mouseOffY) / this.zoom;
                this.mouseOffX = this.mouseOffY = 0;
                this.lastMouseX = this.mouseX;
                this.lastMouseY = this.mouseY;
                if (this.resizing) {
                    let isW = true;
                    if (this.handle.indexOf('t') >= 0) {
                        if (this.parent) {
                            if (this.elmH - diffY < this.minh) {
                                this.mouseOffY = (diffY - (diffY = this.elmH - this.minh))
                            } else if (this.elmY + diffY < this.parentY) this.mouseOffY = (diffY - (diffY = this.parentY - this.elmY))
                        }
                        this.elmY += diffY * 2  / this.scale;
                        this.elmH -= diffY * 2 / this.scale;
                        isW = false;
                    }
                    if (this.handle.indexOf('b') >= 0) {
                        if (this.parent) {
                            if (this.elmH + diffY < this.minh) {
                                this.mouseOffY = (diffY - (diffY = this.minh - this.elmH))
                            } else if (this.elmY + this.elmH + diffY > this.parentH) this.mouseOffY = (diffY - (diffY = this.parentH - this.elmY - this.elmH))
                        }
                        this.elmH += diffY * 2 / this.scale;
                        isW = false;
                    }
                    if (this.handle.indexOf('l') >= 0) {
                        if (this.parent) {
                            if (this.elmW - diffX < this.minw) {
                                this.mouseOffX = (diffX - (diffX = this.elmW - this.minw))
                            } else if (this.elmX + diffX < this.parentX) this.mouseOffX = (diffX - (diffX = this.parentX - this.elmX))
                        }
                        this.elmX += diffX * 2 / this.scale;
                        this.elmW -= diffX * 2 / this.scale
                    }
                    if (this.handle.indexOf('r') >= 0) {
                        if (this.parent) {
                            if (this.elmW + diffX < this.minw) {
                                this.mouseOffX = (diffX - (diffX = this.minw - this.elmW))
                            } else if (this.elmX + this.elmW + diffX > this.parentW) this.mouseOffX = (diffX - (diffX = this.parentW - this.elmX - this.elmW))
                        }
                        this.elmW += diffX * 2 / this.scale
                    }
                    if (this.resizaratio) {
                        if (isW) {
                            this.elmH = this.elmW / this.width * this.height;
                        }else{

                            this.elmW = this.elmH / this.height * this.width;
                        }
                    }
                    if (this.elmW <= 0) {
                        return;
                    }
                    if (this.elmH <= 0) {
                        return;
                    }
                    this.width = Math.max((Math.round(this.elmW / this.grid[0]) * this.grid[0]), this.minw);
                    this.height = Math.max((Math.round(this.elmH / this.grid[1]) * this.grid[1]), this.minh);
                    this.$emit('resizing', this.left, this.top, this.width, this.height)
                } else if (this.dragging) {
                    if (this.parent) {
                        if (this.elmX + diffX < this.parentX) {
                            this.mouseOffX = (diffX * this.zoom - (diffX = this.parentX - this.elmX))
                        } else if (this.elmX + this.elmW + diffX > this.parentW) this.mouseOffX = (diffX * this.zoom - (diffX = this.parentW - this.elmX - this.elmW));
                        if (this.elmY + diffY < this.parentY) {
                            this.mouseOffY = (diffY * this.zoom - (diffY = this.parentY - this.elmY))
                        } else if (this.elmY + this.elmH + diffY > this.parentH) this.mouseOffY = (diffY * this.zoom - (diffY = this.parentH - this.elmY - this.elmH))
                    }
                    this.elmX += diffX / this.scale;
                    this.elmY += diffY / this.scale;
                    if (this.draggable === 2 || this.draggable === 1 || this.draggable === true) {
                        this.left = (Math.round(this.elmX / this.grid[0]) * this.grid[0])
                    }
                    if (this.draggable === 3 || this.draggable === 1 || this.draggable === true) {
                        this.top = (Math.round(this.elmY / this.grid[1]) * this.grid[1])
                    }
                    this.$emit('dragging', this.left, this.top)
                }
            },
            getRestrain (num) {
                const restrain = this.restrain;
                return (num / restrain).toFixed(0) * restrain
            },
            handleUp (e) {
                this.handle = null;
                // 约束
                const restrain = this.restrain;
                if (restrain && restrain > 0) {
                    this.left = this.getRestrain(this.left);
                    this.top = this.getRestrain(this.top);
                    this.width = this.getRestrain(this.width);
                    this.height = this.getRestrain(this.height)
                }
                if (this.resizing) {
                    this.resizing = false;
                    this.$emit('resizestop', [this.left, this.top, this.width, this.height])
                }
                if (this.dragging) {
                    this.dragging = false;
                    this.$emit('dragstop', [this.left, this.top])
                }
                this.elmX = this.left;
                this.elmY = this.top
            }
        },
        watch: {
            x (newVal) {
                if (isNaN(newVal)) {
                    console.error('传入x值为空!')
                } else {
                    this.left = newVal
                }
            },
            y (newVal) {
                if (isNaN(newVal)) {
                    console.error('传入y值为空!')
                } else {
                    this.top = newVal
                }
            },
            w (newVal) {
                if (isNaN(newVal)) {
                    console.error('传入w值为空!')
                } else {
                    this.width = newVal
                }
            },
            h (newVal) {
                if (isNaN(newVal)) {
                    console.error('传入h值为空!')
                } else {
                    this.height = newVal
                }
            }
        },
        computed: {
            style () {
                const w = this.width === 0 ? 'auto' : this.width + 'px';
                const h = this.height === 0 ? 'auto' : this.height + 'px';
                return {
                    top: this.top + 'px',
                    left: this.left + 'px',
                    width: w,
                    height: h,
                    zIndex: this.zIndex
                }
            }
        }
    }
</script>

<style scoped>
    .vdr {
        padding: 0;
        position: absolute;
        user-select: none;
        border-color: #45DBF7;
        outline: none;
        transform: translate(-50%, -50%);
    }

    .draggable:hover {
        cursor: move;
    }

    .handle {
        display: none;
        position: absolute;
        z-index: 999;
    }

    .handle-ml {
        top: 0;
        left: -10px;
        cursor: ew-resize;
        position: absolute;
        height: 100%;
        width: 10px;
    }

    .handle-ml:hover {
        background: rgba(26, 139, 230, 0.62);
    }

    .handle-mr {
        top: 0;
        right: -10px;
        cursor: ew-resize;
        position: absolute;
        height: 100%;
        width: 10px;
    }

    .handle-mr:hover {
        background: rgba(26, 139, 230, 0.62);
    }

    .handle-tm {
        position: absolute;
        width: 100%;
        height: 10px;
        top: -10px;
        left: 0;
        cursor: ns-resize;
    }

    .handle-tm:hover {
        background: rgba(26, 139, 230, 0.62);
    }

    .handle-bm {
        position: absolute;
        width: 100%;
        height: 10px;
        bottom: -10px;
        left: 0;
        cursor: ns-resize;
    }

    .handle-bm:hover {
        background: rgba(26, 139, 230, 0.62);
    }

    .active .handle {
        display: block;
    }

    .active {
        padding: 0;
        background-color: rgba(150, 150, 150, 0.3);
    }

    .handle {
        outline: none;
    }
</style>
