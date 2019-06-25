<template>
  <div class="device-object"
       @mousedown="onMouseDown"
       @mouseup="onMouseUp"
       @mousemove="onMouseMove">
    <img :src="object.url" alt="">
  </div>
</template>

<script>
import Splash from '../../mixins/Splash'

export default {
  name: 'DeviceObject',
  mixins: [
    Splash
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
  methods: {
    onMouseDown (event) {
      console.log({
        x: event.pageX,
        y: event.pageY
      })
      this.dragFrom = true
    },
    onMouseUp () {
      this.dragFrom = null
    },
    onMouseMove (event) {
      if (this.dragFrom) {
        console.log({
          x: event.pageX,
          y: event.pageY
        })
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

    img {
      -webkit-user-drag: none;
    }
  }
</style>
