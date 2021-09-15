<template>
  <div>
    <div class="container">
      <nav_bar></nav_bar>
    <router-view ></router-view>
     
    </div>
  </div>
</template>
<script>
import('../../assets/frontend/css/main.css');
import('../../assets/frontend/css/all.css');
import('../../assets/frontend/css/responsive.css');
import Navbar from './navbar.vue';
export default {
    components:{
      
    nav_bar:Navbar
    }
    
}
</script>