<template>
  <div class="splash-device-box"
       v-if="scene"
       :style="deviceBoxStyle">
    <img :src="im.url" alt="" v-for="im in images" :key="im.id">
  </div>
</template>

<script>
export default {
  name: 'DeviceBox',
  computed: {
    scene () {
      return this.$store.state.Splash.scene
    },
    deviceBoxStyle () {
      return {
        background: this.scene.backgroundColor
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
  }
}
</script>

<style lang="scss">
  .splash-device-box {
    width: 320px;
    height: 568px;
    background: black;
    box-shadow: 0 0 20px silver;
  }
</style>
