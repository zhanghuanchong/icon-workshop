<template>
  <div class="splash-device-box" :style="deviceBoxStyle"></div>
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
    }
  }
}
</script>

<style lang="scss">
  .splash-device-box {
    width: 320px;
    height: 480px;
    background: black;
    box-shadow: 0 0 20px silver;
  }
</style>
