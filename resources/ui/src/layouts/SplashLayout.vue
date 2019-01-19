<template>
  <q-layout view="lHr LpR lff">
    <Header></Header>
    <LeftDrawer></LeftDrawer>
    <RightDrawer></RightDrawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import Header from './SplashLayout/Header'
import LeftDrawer from './SplashLayout/LeftDrawer'
import RightDrawer from './SplashLayout/RightDrawer'

export default {
  name: 'MainLayout',
  components: {
    Header,
    LeftDrawer,
    RightDrawer
  },
  data () {
    return {
      leftDrawer: true,
      rightDrawer: true
    }
  },
  mounted () {
    this.$store.dispatch('Splash/init')
  }
}
</script>

<style>
</style>
