<template>
  <q-dialog class="download-dialog"
    v-model="visible"
    prevent-close
    @cancel="_hide"
  >
    <span slot="title">生成成功！</span>
    <div slot="body">
      <Adsense
        ins-class="download-dialog-ad-ins"
        data-ad-client="ca-pub-5072970286349933"
        data-ad-slot="4784101167"
      ></Adsense>
    </div>

    <template slot="buttons" slot-scope="props">
      <q-btn flat label="取消" @click="_hide" />
      <q-btn label="点击下载" push
             icon="mdi-download"
             color="primary"
             @click="download" />
    </template>
  </q-dialog>
</template>

<script>
import Singleton from '../mixins/Singleton'
import { redirectRoot } from '../common'

export default {
  name: 'download-dialog',
  mixins: [
    Singleton
  ],
  methods: {
    download () {
      if (location.hostname !== 'localhost') {
        redirectRoot(`/splash/download/${this.origin.data}`)
      }
      this._hide()
    },
    hide () {
      this.$emit('close')
    }
  }
}
</script>

<style lang="scss">
  .download-dialog-ad-ins {
    display: inline-block;
    margin: 0 auto;
    width: 336px;
    height: 280px;
  }
</style>
