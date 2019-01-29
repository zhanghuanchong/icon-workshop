<template>
  <q-page class="flex flex-center splash-page-index"
          @click.native="reset">
    <VuePerfectScrollbar ref="scrollbar">
      <div class="center-container" :style="containerStyle">
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
  computed: {
    splash () {
      return this.$store.state.Splash
    },
    containerStyle () {
      const padding = 50
      return {
        minWidth: `${this.splash.width + padding * 2}px`,
        minHeight: `${this.splash.height + padding * 2}px`
      }
    }
  },
  watch: {
    'splash.width' () {
      this.resetScrollbar()
    },
    'splash.height' () {
      this.resetScrollbar()
    }
  },
  methods: {
    reset () {
      this.$store.commit('Splash/setCurrentObject', null)
    },
    resetScrollbar () {
      this.$nextTick(() => {
        const bar = this.$refs.scrollbar
        if (bar && bar.$el) {
          const $el = bar.$el
          $el.scrollLeft = ($el.scrollWidth - $el.clientWidth) / 2
          $el.scrollTop = ($el.scrollHeight - $el.clientHeight) / 2
        }
      })
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
