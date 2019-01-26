<template>
  <q-page class="flex flex-center splash-page-index"
          @click.native="reset">
    <DeviceBox></DeviceBox>
  </q-page>
</template>

<script>
import DeviceBox from '../../components/Splash/DeviceBox'

export default {
  name: 'SplashPageIndex',
  components: {
    DeviceBox
  },
  methods: {
    reset () {
      this.$store.commit('Splash/setCurrentObject', null)
    }
  }
}
</script>

<style lang="scss">
  .splash-page-index {
    background: #eee;
  }
</style>
