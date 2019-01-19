<template>
  <q-layout-header class="splash-layout-header">
    <q-toolbar color="white" text-color="dark">
      <q-field label="平台：">
        <q-checkbox v-model="platforms"
                    checked-icon="mdi-apple"
                    unchecked-icon="mdi-apple mdi-inactive"
                    label="iOS"
                    val="ios"></q-checkbox>
        <q-checkbox v-model="platforms"
                    checked-icon="mdi-android"
                    unchecked-icon="mdi-android mdi-inactive"
                    label="Android"
                    val="android"
                    class="ml-10"></q-checkbox>
      </q-field>

      <q-field label="方向：" class="ml-15">
        <q-checkbox v-model="orientations"
                    checked-icon="mdi-cellphone-iphone"
                    unchecked-icon="mdi-cellphone-iphone mdi-inactive"
                    val="portrait">
          <q-tooltip>竖屏</q-tooltip>
        </q-checkbox>
        <q-checkbox v-model="orientations"
                    checked-icon="mdi-cellphone-iphone mdi-rotate-90"
                    unchecked-icon="mdi-cellphone-iphone mdi-inactive mdi-rotate-90"
                    val="landscape"
                    class="ml-10">
          <q-tooltip>横屏</q-tooltip>
        </q-checkbox>
      </q-field>

      <q-btn color="primary"
             push
             class="ml-auto"
             icon="mdi-auto-fix"
             icon-right="mdi-chevron-right"
             label="生成"></q-btn>
    </q-toolbar>
  </q-layout-header>
</template>

<script>
export default {
  name: 'SplashLayoutHeader',
  data () {
    return {
      platforms: ['ios', 'android'],
      orientations: ['portrait', 'landscape']
    }
  }
}
</script>

<style lang="scss">
.splash-layout-header {
  .q-field-label {
    width: auto;
    padding-right: 0;
  }

  .q-field-content {
    width: auto;
  }

  .q-option-label {
    margin-left: 4px;
  }
}
</style>
