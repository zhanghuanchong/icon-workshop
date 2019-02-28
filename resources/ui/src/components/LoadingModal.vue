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
        ins-class="loading-modal-ad-ins"
        data-ad-client="ca-pub-5072970286349933"
        data-ad-slot="8595854677"
      ></Adsense>
    </div>
    <div class="loading">
      <q-spinner size="20px"></q-spinner>
      <span class="ml-10">{{ message || '操作进行中，请稍候...' }}</span>

      <q-btn label="取消" class="ml-auto"
             v-if="cancellable"
             @click="$emit('cancel')"
             color="warning"></q-btn>
    </div>
  </q-modal>
</template>

<script>
export default {
  name: 'loading-modal',
  props: [
    'visible',
    'message',
    'cancellable'
  ]
}
</script>

<style lang="scss">
  .loading-modal {
    .modal-content {
      padding: 20px;

      .loading {
        margin: 20px 0 0;
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
