<template>
  <q-page class="flex flex-center splash-page-index"
          @click.native="reset">
    <VuePerfectScrollbar v-once>
      <div class="center-container">
        <DeviceBox></DeviceBox>
      </div>
    </VuePerfectScrollbar>
  </q-page>
</template>

<script>
import DeviceBox from '../../components/Splash/DeviceBox'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'

export default {
  name: 'SplashPageIndex',
  components: {
    DeviceBox,
    VuePerfectScrollbar
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

    > .ps-container {
      width: 100%;
      height: calc(100vh - 50px);

      .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
      }
    }
  }
</style>
