<template>
  <q-layout-drawer
    behavior="desktop"
    :width="80"
    v-model="visible"
  >
  </q-layout-drawer>
</template>

<script>
export default {
  name: 'SplashLayoutLeftDrawer',
  data () {
    return {
      visible: true
    }
  }
}
</script>

<style lang="scss">

</style>
