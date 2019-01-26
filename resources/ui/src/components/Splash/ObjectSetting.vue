<template>
  <q-tabs align="justify" class="rd-0 object-setting-tab">
    <q-tab default slot="title"
           class="horizontal"
           name="setting"
           icon="mdi-cogs" label="属性" />

    <q-tab-pane name="setting" class="ph-8 pv-6">
      <q-field label="横坐标" label-width="12">
        <span class="right-label">{{ object.left }}%</span>
        <q-slider v-model="object.left" @input="save"
                  :min="0" :max="100"></q-slider>
      </q-field>
      <q-field label="纵坐标" label-width="12">
        <span class="right-label">{{ object.top }}%</span>
        <q-slider v-model="object.top" @input="save"
                  :min="0" :max="100"></q-slider>
      </q-field>
      <q-field label="缩放" label-width="12">
        <span class="right-label">{{ object.scale }}倍</span>
        <q-slider v-model="object.scale" @input="save"
                  :min="0" :max="2" :step="0.01"></q-slider>
      </q-field>
    </q-tab-pane>
  </q-tabs>
</template>

<script>
export default {
  name: 'ObjectSetting',
  computed: {
    object () {
      return this.$store.state.Splash.object
    }
  },
  methods: {
    save () {
      this.$store.commit('Splash/updateObject', this.object)
    }
  }
}
</script>

<style lang="scss">
.object-setting-tab {
  height: 300px;
  margin-top: auto;

  .q-field {
    position: relative;

    .right-label {
      position: absolute;
      top: 0;
      right: 0;
      line-height: 28px;
      font-weight: bold;
      color: var(--q-color-primary);
    }
  }
}
</style>
