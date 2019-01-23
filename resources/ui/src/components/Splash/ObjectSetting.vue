<template>
  <q-tabs align="justify" class="rd-0 object-setting-tab">
    <q-tab default slot="title"
           class="horizontal"
           name="setting"
           icon="mdi-cogs" label="属性" />

    <q-tab-pane name="setting" class="ph-8 pv-6">
      请选择一个图层
    </q-tab-pane>
  </q-tabs>
</template>

<script>
export default {
  name: 'ObjectSetting'
}
</script>

<style lang="scss">
.object-setting-tab {
  height: 300px;
  margin-top: auto;
}
</style>
