<template>
  <q-layout view="lHr LpR lff">
    <Header></Header>
    <LeftDrawer></LeftDrawer>
    <RightDrawer></RightDrawer>

    <q-page-container>
      <router-view />
    </q-page-container>

    <UploadDialog></UploadDialog>
  </q-layout>
</template>

<script>
import Header from './SplashLayout/Header'
import LeftDrawer from './SplashLayout/LeftDrawer'
import RightDrawer from './SplashLayout/RightDrawer'
import UploadDialog from '../components/UploadDialog'

export default {
  name: 'MainLayout',
  components: {
    Header,
    LeftDrawer,
    RightDrawer,
    UploadDialog
  },
  data () {
    return {
      leftDrawer: true,
      rightDrawer: true
    }
  }
}
</script>

<style>
</style>
