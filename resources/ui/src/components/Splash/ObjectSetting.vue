<template>
  <q-tabs align="justify" class="rd-0 object-setting-tab">
    <q-tab default slot="title"
           class="horizontal"
           name="setting"
           icon="mdi-cogs" label="属性" />

    <q-tab-pane name="setting" class="ph-8 pv-6">
      <q-field label="横坐标" label-width="12">
        <span class="right-label">
          <q-btn flat round
                 v-if="object.left !== 50"
                 @click="object.left = 50; save()"
                 size="sm"
                 icon="mdi-restore"></q-btn>
          {{ object.left }}%
        </span>
        <q-slider v-model="object.left" @input="save"
                  :min="0" :max="100"></q-slider>
      </q-field>
      <q-field label="纵坐标" label-width="12">
        <span class="right-label">
          <q-btn flat round
                 v-if="object.top !== 50"
                 @click="object.top = 50; save()"
                 size="sm"
                 icon="mdi-restore"></q-btn>
          {{ object.top }}%
        </span>
        <q-slider v-model="object.top" @input="save"
                  :min="0" :max="100"></q-slider>
      </q-field>
      <q-field label="缩放" label-width="12">
        <span class="right-label">
          <q-btn flat round
                 v-if="object.scale !== 1"
                 @click="object.scale = 1; save()"
                 size="sm"
                 icon="mdi-restore"></q-btn>
          {{ object.scale }}倍
        </span>
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
}
</style>
