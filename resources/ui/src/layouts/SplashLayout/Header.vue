<template>
  <q-layout-header>
    <q-toolbar color="white">
      <q-field label="平台" label-width="4">
        <q-select v-model="platforms"
                  class="w-110"
                  multiple
                  :options="allPlatforms"
                  placeholder="至少选一个"></q-select>
      </q-field>

      <q-field label="方向" label-width="4">
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
      allPlatforms: [
        {
          label: 'iOS',
          value: 'ios'
        }, {
          label: 'Android',
          value: 'android'
        }
      ]
    }
  }
}
</script>

<style lang="scss">

</style>
