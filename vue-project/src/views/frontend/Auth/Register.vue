<template>
    <div>
       <div class="card m-auto w-50">
           <div class="card-header">
               <h2>User Register</h2>
           </div>
           <div class="card-body">
                <div class="form-group">
                  
                    <label for="Name">Name</label>
                    <input type="text"  v-model="user.name" class="form-control" id="Name"  placeholder="Enter Name">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</!-->
                </div>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" v-model="user.email" class="form-control" id="Email" placeholder="Enter email">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="Pass">Password</label>
                    <input type="password" v-model="user.password" class="form-control" id="Pass" placeholder="Password">
                </div>
               
                <button type="submit" @click="userRegister()" class="btn btn-primary">Register</button>
                <router-link :to="{name:'login'}" >Login</router-link>
           </div>
       </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            user:{name:null,email:null,password:null}
        }
    },
    methods:{
        userRegister(){
            axios.post('/register', {
                name:this.user.name ,
                email:this.user.email ,
                password:this.user.password ,
            })
            .then(function (response) {
                
                localStorage.setItem('AToken',response.data.access_token);
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }
    
}
</script>
