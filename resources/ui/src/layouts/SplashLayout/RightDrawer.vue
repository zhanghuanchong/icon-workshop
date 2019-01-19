<template>
  <q-layout-drawer
    side="right"
    behavior="desktop"
    v-model="visible"
  >
    <q-tabs align="justify">
      <q-tab default slot="title" name="layers" icon="mdi-layers" label="图层" />

      <q-tab-pane name="layers">

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
  }
}
</script>

<style lang="scss">

</style>
