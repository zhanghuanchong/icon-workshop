<template>
    <div class="splash-device-box"
         v-if="scene"
         :style="deviceBoxStyle">
        <ImageDeformation v-for="(im, index) in images" :key="index"
                          :w="im.width * im.scale * baseScale()"
                          :h="im.height * im.scale * baseScale()"
                          :x="splash.width / 100 * im.left"
                          :y="splash.height / 100 * im.top"
                          :scale="splash.scale"
                          @dragging="dragging(index, arguments)"
                          @dragstop="selectIndex(index)"
                          @dragdown="select(im)"
                          @resizing="resizing(index, arguments)"
                          @resizestop="selectIndex(index)"
                          resizaratio>
            <img :src="im.url" class="object" :class="objectClass(im)" @click.stop="select(im)">
        </ImageDeformation>
    </div>
</template>

<script>
    import ImageDeformation from '../ImageDeformation'

    export default {
        name: 'DeviceBox',
        components: {ImageDeformation},
        computed: {
            splash () {
                return this.$store.state.Splash
            },
            scene () {
                return this.$store.state.Splash.scene
            },
            deviceBoxStyle () {
                return {
                    width: `${this.splash.width}px`,
                    height: `${this.splash.height}px`,
                    background: this.scene.backgroundColor,
                    transform: `scale(${this.splash.scale})`
                }
            },
            images () {
                return this.scene.objects.filter(o => {
                    return o.proto === 'Image'
                })
            },
            strings () {
                return this.scene.objects.filter(o => {
                    return o.proto === 'String'
                })
            },
            selected () {
                return this.$store.state.Splash.object
            }
        },
        methods: {
            objectClass (o) {
                if (this.selected && o.id !== this.selected.id) {
                    return 'inactive'
                }
                if (this.selected && o.id === this.selected.id) {
                    return 'active'
                }
            },
            objectStyle (o) {
                let scale = o.scale

                const width = this.splash.width
                const height = this.splash.height
                const short = Math.min(width, height)
                let baseScale = short / 375

                const rate = width / height
                if (rate >= 1) {
                    baseScale *= 0.625
                } else if (rate >= 0.75) {
                    baseScale *= 0.75
                } else if (rate >= 0.66) {
                    baseScale *= 0.875
                }

                return {
                    left: `${o.left}%`,
                    top: `${o.top}%`,
                    transform: `translate(-50%, -50%) scale(${baseScale * scale})`
                }
            },
            select (o) {
                this.$store.commit('Splash/setCurrentObject', o)
            },
            baseScale() {
                const width = this.splash.width
                const height = this.splash.height
                const short = Math.min(width, height)
                let baseScale = short / 375

                const rate = width / height
                if (rate >= 1) {
                    baseScale *= 0.625
                } else if (rate >= 0.75) {
                    baseScale *= 0.75
                } else if (rate >= 0.66) {
                    baseScale *= 0.875
                }
                return baseScale;
            },
            dragging(index, drag) {
                let left = Math.round(100 * drag[0] / this.splash.width * 100) / 100;
                let top = Math.round(100 * drag[1] / this.splash.height * 100) / 100;
                this.$set(this.images[index], 'left', left);
                this.$set(this.images[index], 'top', top);
            },
            resizing(index, size) {
                let left = Math.round(100 * size[0] / this.splash.width * 100) / 100;
                let top = Math.round(100 * size[1] / this.splash.height * 100) / 100;
                let scale = Math.round(size[2] / (this.images[index].width * this.baseScale()) * 100) / 100;
                this.$set(this.images[index], 'left', left);
                this.$set(this.images[index], 'top', top);
                this.$set(this.images[index], 'scale', scale);
            },
            selectIndex(index) {
                if (this.images[index].left > 100) {
                    this.$set(this.images[index], 'left', 100);
                }
                if (this.images[index].left < 0) {
                    this.$set(this.images[index], 'left', 0);
                }
                if (this.images[index].top > 100) {
                    this.$set(this.images[index], 'top', 100);
                }
                if (this.images[index].top < 0) {
                    this.$set(this.images[index], 'top', 0);
                }
                if (this.images[index].scale > 2) {
                    this.$set(this.images[index], 'scale', 2);
                }
                if (this.images[index].scale < 0) {
                    this.$set(this.images[index], 'scale', 0);
                }
            }
        }
    }
</script>

<style lang="scss">
    @import "../../css/variable";

    .splash-device-box {
        transition: all 0.3s;
        background: white;
        box-shadow: 0 0 20px silver;
        position: absolute;

        .object {
            position: absolute;
            width: 100%;
            height: 100%;

            &.inactive {
                opacity: 0.5;
            }

            &.active {
                //outline: 3px solid $light-primary;
            }
        }
    }
</style>
