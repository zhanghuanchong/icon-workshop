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
import _ from 'lodash'

const padding = 50

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
      return {
        minWidth: `${this.splash.width + padding * 2}px`,
        minHeight: `${this.splash.height + padding * 2}px`
      }
    }
  },
  watch: {
    'splash.width' () {
      this.resetLayout()
    },
    'splash.height' () {
      this.resetLayout()
    }
  },
  methods: {
    reset () {
      this.$store.commit('Splash/setCurrentObject', null)
    },
    resetLayout () {
      this.$nextTick(() => {
        this.resetScrollbar()
        this.scaleDeviceContainer()
      })
    },
    resetScrollbar () {
      const bar = this.$refs.scrollbar
      if (bar && bar.$el) {
        const $el = bar.$el
        $el.scrollLeft = ($el.scrollWidth - $el.clientWidth) / 2
        $el.scrollTop = ($el.scrollHeight - $el.clientHeight) / 2
      }
    },
    scaleDeviceContainer () {
      if (!this.splash.autoScale) {
        return
      }
      const $container = this.$el.querySelector('.ps-container')
      const rw = $container.clientWidth / (this.splash.width + padding * 2)
      const rh = $container.clientHeight / (this.splash.height + padding * 2)
      const scale = _.round(Math.min(rw, rh, 1), 2)
      this.$store.commit('Splash/update', {
        scale
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
