<template>
  <q-layout view="lHr LpR lff">
    <Header></Header>
    <LeftDrawer></LeftDrawer>
    <RightDrawer></RightDrawer>

    <q-page-container>
      <router-view />
    </q-page-container>

    <UploadDialog></UploadDialog>
    <LoadingModal></LoadingModal>
  </q-layout>
</template>

<script>
import Header from './Header'
import LeftDrawer from './LeftDrawer'
import RightDrawer from './RightDrawer'
import UploadDialog from '../../components/UploadDialog'
import LoadingModal from '../../components/LoadingModal'

export default {
  name: 'MainLayout',
  components: {
    Header,
    LeftDrawer,
    RightDrawer,
    UploadDialog,
    LoadingModal
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
