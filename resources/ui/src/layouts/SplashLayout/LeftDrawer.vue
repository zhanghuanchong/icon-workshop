<template>
  <q-layout-drawer
    behavior="desktop"
    :width="160"
    v-model="visible"
  >
    <q-tabs align="justify" class="rd-0">
      <q-tab slot="title" name="preview"
             class="horizontal"
             icon="mdi-tablet-cellphone"
             label="预览" default />

      <q-tab-pane name="preview">

      </q-tab-pane>
    </q-tabs>
  </q-layout-drawer>
</template>

<script>
export default {
  name: 'SplashLayoutLeftDrawer',
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
