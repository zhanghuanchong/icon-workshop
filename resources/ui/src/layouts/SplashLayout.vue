<template>
  <q-layout view="lHr LpR lff">
    <q-layout-header>
      <q-toolbar color="white"></q-toolbar>
    </q-layout-header>

    <q-layout-drawer
      behavior="desktop"
      :width="80"
      v-model="leftDrawer"
    >
    </q-layout-drawer>

    <q-layout-drawer
      side="right"
      behavior="desktop"
      v-model="rightDrawer"
    >
    </q-layout-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
export default {
  name: 'MainLayout',
  data () {
    return {
      leftDrawer: true,
      rightDrawer: true
    }
  },
  methods: {
  }
}
</script>

<style>
</style>
