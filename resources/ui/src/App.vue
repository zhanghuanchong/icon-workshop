<template>
  <div id="q-app">
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style lang="scss">
  @import "~marvel-devices.css";
  @import "~vue-draggable-resizable/dist/VueDraggableResizable.css";

  @import "./css/helper";
  @import "./css/main";
</style>
