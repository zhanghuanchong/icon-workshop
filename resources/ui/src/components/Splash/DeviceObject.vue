<template>
  <div class="device-object">
    <img :src="object.url" alt="">
  </div>
</template>

<script>
export default {
  name: 'DeviceObject',
  props: {
    object: {
      type: Object,
      required: true
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
      outline: 3px solid $light-primary;
    }
  }
</style>
