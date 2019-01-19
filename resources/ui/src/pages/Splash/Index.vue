<template>
  <q-page class="flex flex-center splash-page-index">
    <div class="device-box"></div>
  </q-page>
</template>

<script>
export default {
  name: 'SplashPageIndex'
}
</script>

<style lang="scss">
  .splash-page-index {
    background: #eee;

    .device-box {
      width: 320px;
      height: 480px;
      background: white;
      box-shadow: 0 0 20px silver;
    }
  }
</style>
