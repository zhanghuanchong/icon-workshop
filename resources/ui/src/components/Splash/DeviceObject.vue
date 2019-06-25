<template>
  <div class="device-object"
       :class="objectClass"
       :style="objectStyle"
       @mousedown.stop.prevent="onMouseDown"
       @mouseup.stop.prevent="onMouseUp"
       @mousemove.stop.prevent="onMouseMove">
    <img :src="object.url" alt="">
  </div>
</template>

<script>
import Splash from '../../mixins/Splash'
import { EventHandlerMixin } from '../../common'

export default {
  name: 'DeviceObject',
  mixins: [
    Splash,
    EventHandlerMixin('splash-reset-current-object', 'onMouseUp')
  ],
  props: {
    object: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      dragFrom: null
    }
  },
  computed: {
    objectClass () {
      const all = []
      if (this.selected) {
        all.push(this.object.id === this.selected.id ? 'active' : 'inactive')
      }
      if (this.splash.draggingObject && this.splash.draggingObject !== this.object.id) {
        all.push('no-interact')
      }
      return all
    },
    objectStyle () {
      const scale = this.object.scale * this.baseScale
      return {
        left: `${this.object.left}%`,
        top: `${this.object.top}%`,
        transform: `translate(-50%, -50%) scale(${scale})`
      }
    },
    selected () {
      return this.$store.state.Splash.object
    }
  },
  methods: {
    onMouseDown (event) {
      this.dragFrom = event
      this.$store.commit('Splash/update', {
        draggingObject: this.object.id
      })
    },
    onMouseUp () {
      this.dragFrom = null
      this.$store.commit('Splash/update', {
        draggingObject: null
      })
    },
    onMouseMove (event) {
      if (this.dragFrom) {
        const width = this.splash.width * this.baseScale * this.splash.scale
        const height = this.splash.height * this.baseScale * this.splash.scale

        const leftDelta = (event.pageX - this.dragFrom.pageX) / width * 100
        const topDelta = (event.pageY - this.dragFrom.pageY) / height * 100

        let left = Math.round(this.object.left + leftDelta)
        let top = Math.round(this.object.top + topDelta)

        left = Math.max(Math.min(left, 100), 0)
        top = Math.max(Math.min(top, 100), 0)

        if (left === this.object.left && top === this.object.top) {
          return
        }

        const update = {
          id: this.object.id,
          left,
          top
        }
        this.$store.commit('Splash/updateObject', update)

        this.dragFrom = event
      }
    }
  }
}
</script>

<style lang="scss">
  @import "../../css/variable";

  .device-object {
    position: absolute;
    transform: translate(-50%, -50%);

    &.inactive {
      opacity: 0.5;
    }

    &.active {
      cursor: move;
      outline: 3px solid $light-primary;
    }

    &.no-interact {
      pointer-events: none;
    }

    img {
      -webkit-user-drag: none;
    }
  }
</style>
