<template>
  <q-layout-drawer
    side="right"
    :width="160"
    behavior="desktop"
    v-model="visible"
  >
    <q-tabs align="justify" class="rd-0">
      <q-tab default slot="title"
             class="horizontal"
             name="layers"
             icon="mdi-layers" label="图层" />

      <q-tab-pane name="layers" class="ph-8 pv-6">
        <div class="column">
          <q-btn color="secondary" icon="mdi-plus"
                 label="图片"></q-btn>
          <q-btn color="secondary" icon="mdi-plus"
                 class="mt-8"
                 label="文字"></q-btn>
        </div>
      </q-tab-pane>
    </q-tabs>
  </q-layout-drawer>
</template>

<script>
export default {
  name: 'SplashLayoutRightDrawer',
  data () {
    return {
      visible: true
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.visible = true
    })
  }
}
</script>

<style lang="scss">

</style>
