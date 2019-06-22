<template>
    <q-dialog class="download-dialog"
              v-model="visible"
              prevent-close
              @cancel="_hide"
    >
        <span slot="title">生成成功！</span>
        <template slot="buttons" slot-scope="props">
            <div class="download-buttons">
                <q-btn flat label="取消" @click="_hide"/>
                <q-btn label="点击下载"
                       push
                       class="min-w-120"
                       icon="mdi-download"
                       :loading="loading"
                       :percentage="percent"
                       color="primary"
                       @click="download"/>
            </div>
        </template>
    </q-dialog>
</template>

<script>
    import Singleton from '../mixins/Singleton'
    import {redirectRoot} from '../common'

    export default {
        name: 'download-dialog',
        mixins: [
            Singleton
        ],
        data () {
            return {
                loading: false,
                percent: 0
            }
        },
        methods: {
            download () {
                this.$q.notify({
                    type: 'positive',
                    message: '即将开始下载...',
                    position: 'top',
                    icon: 'mdi-download'
                })
                redirectRoot(this.origin.data)
                this.loading = true
                this.percent = 100
                setTimeout(() => {
                    this._hide()
                }, 2000)
            },
            hide () {
                this.$emit('close')
            },
            show () {
                this.loading = true
                this.percent = 0

                const itv = setInterval(() => {
                    this.percent += 10
                    if (this.percent > 100) {
                        this.loading = false
                        clearInterval(itv)
                    }
                }, 100)
            }
        }
    }
</script>

<style lang="scss">
    .download-dialog {
        .modal-body.modal-scroll {
            max-height: 300px;
        }
    }

    .download-dialog-ad-ins {
        display: block;
        margin: 0 auto;
        width: 336px;
        height: 280px;
    }

    .download-buttons {
        padding: 0 2px 2px;
    }
</style>
