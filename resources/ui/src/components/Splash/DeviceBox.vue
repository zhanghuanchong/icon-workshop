<template>
  <div class="splash-device-box"
       v-if="scene"
       :style="deviceBoxStyle">
    <img :src="im.url" alt=""
         class="object"
         :class="objectClass(im)"
         :style="objectStyle(im)"
         @click.stop="select(im)"
         v-for="im in images" :key="im.id">
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
      return {
        left: `${o.left}%`,
        top: `${o.top}%`,
        transform: `translate(-50%, -50%) scale(${o.scale})`
      }
    },
    select (o) {
      this.$store.commit('Splash/setCurrentObject', o)
    }
  }
}
</script>

<style lang="scss">
  @import "../../css/variable";

  .splash-device-box {
    width: 320px;
    height: 568px;
    background: black;
    box-shadow: 0 0 20px silver;
    position: relative;

    .object {
      position: absolute;
      transform: translate(-50%, -50%);

      &.inactive {
        opacity: 0.5;
      }
      &.active {
        outline: 3px solid $light-primary;
      }
    }
  }
</style>
