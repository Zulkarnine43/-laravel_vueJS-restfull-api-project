import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'frontend-master',
      component: ()=>import('../src/views/frontend/frontend-master.vue'),
      redirect:{path:'/home'},
      children:[
        {
          path:'home',
          name:'home',
          component:()=>import('../src/views/frontend/home/home.vue'),
        },
        {
          path:'product-details/:product_id',
          name:'product_details',
          component:()=>import('../src/views/frontend/home/product-details.vue'),
        },
        {
          path:'log-out',
          name:'log-out',
          component:()=>import('../src/views/frontend/Auth/logOut.vue'),
        },

      ]
    },
    {
      path:'/admin-login',
      name:'admin-login',
      component:()=>import('../src/views/frontend/Auth/auth-master.vue'),
      redirect:{path:'/admin-login/login'},
      children:[
        {
          path:'login',
          name:'login',
          component:()=>import('../src/views/frontend/Auth/login.vue'),
        },
        {
          path:'register',
          name:'register',
          component:()=>import('../src/views/frontend/Auth/Register.vue'),
        },
      ]
    },
    {
      path:'/dashboard',
      name:'dashboard',
      component:()=>import('../src/views/admin/admin-master.vue'),
      children:[
        {
          path:'add-category',
          name:'add-category',
          component:()=>import('../src/views/admin/category/add_category.vue'),
        },
        {
          path:'all-category',
          name:'all-category',
          component:()=>import('../src/views/admin/category/all-categories.vue'),
        },
        {
          path:'edit-category/:category_id',
          name:'edit-category',
          component:()=>import('../src/views/admin/category/edit_category.vue'),
        },
        {
          path:'all-products',
          name:'all-products',
          component:()=>import('../src/views/admin/product/all-products.vue'),
        },
      ],
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    }
  ],
  mode:'history'
})
