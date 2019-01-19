<template>
  <q-page class="flex flex-center splash-page-index">
    <DeviceBox></DeviceBox>
  </q-page>
</template>

<script>
import DeviceBox from '../../components/Splash/DeviceBox'

export default {
  name: 'SplashPageIndex',
  components: {
    DeviceBox
  }
}
</script>

<style lang="scss">
  .splash-page-index {
    background: #eee;
  }
</style>
