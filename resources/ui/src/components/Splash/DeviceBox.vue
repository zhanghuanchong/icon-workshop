<template>
  <div class="splash-device-box"
       v-if="scene"
       :style="deviceBoxStyle">
    <vue-draggable-resizable v-for="im in images"
                             @dragstop="onDragStop(im, arguments)"
                             @resizestop="onResizeStop(im, arguments)"
                             :key="im.id"
                             :ref="`vdr_${im.id}`"
                             :x="drX(im)"
                             :y="drY(im)"
                             :w="drWidth(im)"
                             :h="drHeight(im)"
                             :lock-aspect-ratio="true">
      <img :src="im.url" alt=""
           class="object image"
           :class="objectClass(im)"
           @click.stop="select(im)">
    </vue-draggable-resizable>
  </div>
</template>

<script>
import VueDraggableResizable from 'vue-draggable-resizable'

export default {
  name: 'DeviceBox',
  components: {
    VueDraggableResizable
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
    },
    baseScale () {
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
      return baseScale
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
    select (o) {
      this.$store.commit('Splash/setCurrentObject', o)
    },
    drX (o) {
      return o.left / 100 * this.splash.width - this.drWidth(o) / 2
    },
    drY (o) {
      return o.top / 100 * this.splash.height - this.drHeight(o) / 2
    },
    drWidth (o) {
      return o.scale * o.width
    },
    drHeight (o) {
      return o.scale * o.height
    },
    onDragStop (o, arg) {
      const left = arg[0]
      const top = arg[1]
      const pl = Math.round((left + this.drWidth(o) / 2) / this.splash.width * 100)
      const pt = Math.round((top + this.drHeight(o) / 2) / this.splash.height * 100)
      this.$store.commit('Splash/updateObject', {
        id: o.id,
        left: pl,
        top: pt
      })
    },
    onResizeStop (o, arg) {
      const [ left, top, width, height ] = arg
      console.log(o, left, top, width, height)
    }
  }
}
</script>

<style lang="scss">
  @import "../../css/variable";

  .splash-device-box {
    transition: all 0.3s;
    background: white;
    box-shadow: 0 0 20px silver;
    position: absolute;

    .object {
      position: absolute;

      &.image {
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
      }

      &.inactive {
        opacity: 0.5;
      }
    }

    .vdr {
      border: 1px solid transparent;
      cursor: move;

      &.active {
        border: 1px dashed #000;
      }
    }
  }
</style>
