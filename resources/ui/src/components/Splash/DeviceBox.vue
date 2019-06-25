<template>
  <div class="splash-device-box"
       v-if="scene"
       :style="deviceBoxStyle">
    <DeviceObject v-for="im in images"
                  :key="im.id"
                  @click.native.stop="select(im)"
                  :object="im"></DeviceObject>
    <div class="device-border" :style="deviceBorderStyle"></div>
  </div>
</template>

<script>
import DeviceObject from './DeviceObject'
import Splash from '../../mixins/Splash'

export default {
  name: 'DeviceBox',
  components: {
    DeviceObject
  },
  mixins: [
    Splash
  ],
  computed: {
    deviceBoxStyle () {
      return {
        width: `${this.splash.width}px`,
        height: `${this.splash.height}px`,
        background: this.scene.backgroundColor,
        transform: `scale(${this.splash.scale})`
      }
    },
    deviceBorderStyle () {
      return {
        width: `${this.splash.width}px`,
        height: `${this.splash.height}px`
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
    }
  },
  methods: {
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

    .device-border {
      position: absolute;
      left: 0;
      top: 0;
      outline: #666 solid 1px;
      box-shadow: #666 0 0 30px;
      pointer-events: none;
    }
  }
</style>
