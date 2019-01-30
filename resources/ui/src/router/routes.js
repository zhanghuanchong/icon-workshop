
const routes = [
  {
    path: '/splash',
    component: () => import('layouts/SplashLayout/Index.vue'),
    children: [
      { path: '', component: () => import('pages/Splash/Index.vue') }
    ]
  },
  {
    path: '/',
    redirect: '/splash'
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
