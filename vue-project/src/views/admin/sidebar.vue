<template>
    <div> 
         <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library-->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                   Category
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link :to="{name:'all-category'}" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Category</p>
                    </router-link>
                  </li>
                  <li class="nav-item">
                    <router-link :to="{name:'add-category'}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Category</p>
                    </router-link>
                  </li>
                </ul>
              </li>
               <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                   Product
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <router-link :to="{name:'all-products'}" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Product</p>
                    </router-link>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Simple Link
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
            </ul>
          </nav>
    </div>
</template>
<script>
export default {
  methods:{
    logout() {
      localStorage.removeItem("AToken");
      this.$router.push("/admin-login");
    }
  }
}
</script>
