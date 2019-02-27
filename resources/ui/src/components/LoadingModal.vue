<template>
  <q-modal
    class="loading-modal"
    v-model="visible"
    no-route-dismiss
    no-esc-dismiss
    no-backdrop-dismiss
    position="top"
  >

    <div class="ad">
      <Adsense
        v-if="isMounted"
        ins-class="loading-modal-ad-ins"
        data-ad-client="ca-pub-5072970286349933"
        data-ad-slot="8595854677"
      ></Adsense>
    </div>
    <div class="loading">
      <q-spinner size="20px"></q-spinner>
      <span class="ml-10">{{ (origin && origin.message) || '操作进行中，请稍候...' }}</span>

      <q-btn label="取消" class="ml-auto"
             v-if="origin && origin.onCancel"
             @click="origin.onCancel"
             color="warning"></q-btn>
    </div>
  </q-modal>
</template>

<script>
import Singleton from '../mixins/Singleton'

export default {
  name: 'loading-modal',
  mixins: [
    Singleton
  ],
  data () {
    return {
      isMounted: false
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.isMounted = true
    })
  }
}
</script>

<style lang="scss">
  .loading-modal {
    .modal-content {
      padding: 20px;

      .loading {
        margin: 20px 10px 5px;
        display: flex;
        align-items: center;
      }
    }
  }

  .loading-modal-ad-ins {
    display: inline-block;
    width: 300px;
    height: 250px;
  }
</style>
