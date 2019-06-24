<template>
  <div class="splash-device-box"
       v-if="scene"
       :style="deviceBoxStyle">
    <DeviceObject v-for="im in images"
                  :key="im.id"
                  @click.native.stop="select(im)"
                  :class="objectClass(im)"
                  :style="objectStyle(im)"
                  :object="im"></DeviceObject>
  </div>
</template>

<script>
import DeviceObject from './DeviceObject'

export default {
  name: 'DeviceBox',
  components: {
    DeviceObject
  },
  computed: {
    splash () {
      return this.$store.state.Splash
    },
    scene () {
      return this.$store.state.Splash.scene
    },
    deviceBoxStyle () {
      return {
        width: `${this.splash.width}px`,
        height: `${this.splash.height}px`,
        background: this.scene.backgroundColor,
        transform: `scale(${this.splash.scale})`
      }
    },
    images () {
      return this.scene.objects.filter(o => {
        return o.proto === 'Image'
      })
    },
    strings () {
      return this.scene.objects.filter(o => {
        return o.proto === 'String'
      })
    },
    selected () {
      return this.$store.state.Splash.object
    }
  },
  methods: {
    objectClass (o) {
      if (this.selected && o.id !== this.selected.id) {
        return 'inactive'
      }
      if (this.selected && o.id === this.selected.id) {
        return 'active'
      }
    },
    objectStyle (o) {
      let scale = o.scale

      const width = this.splash.width
      const height = this.splash.height
      const short = Math.min(width, height)
      let baseScale = short / 375

      const rate = width / height
      if (rate >= 1) {
        baseScale *= 0.625
      } else if (rate >= 0.75) {
        baseScale *= 0.75
      } else if (rate >= 0.66) {
        baseScale *= 0.875
      }

      return {
        left: `${o.left}%`,
        top: `${o.top}%`,
        transform: `translate(-50%, -50%) scale(${baseScale * scale})`
      }
    },
    select (o) {
      this.$store.commit('Splash/setCurrentObject', o)
    }
  }
}
</script>

<style lang="scss">
  .splash-device-box {
    transition: all 0.3s;
    background: white;
    box-shadow: 0 0 20px silver;
    position: absolute;
  }
</style>
