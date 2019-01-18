<template>
  <q-layout-drawer
    side="right"
    behavior="desktop"
    v-model="visible"
  >
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
