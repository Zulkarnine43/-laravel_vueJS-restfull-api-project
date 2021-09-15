<template>
    <div>
        <h2 class="text-center mb-3">All Categories</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="category, index in categories" v-bind:key="category.id" >
                    <th scope="row">{{index+1}}</th>
                    <td>{{category.category_name}}</td>
                    <td>{{category.category_description}}</td>
                    <td>{{category.created_at}}</td>
                    <td>
                        <div class="btn-group">
                            <router-link :to="{name: 'edit-category', params:{category_id: category.id}}" class="btn btn-outline-warning">Edit</router-link>
                            <button @click="deleteCategory(category.id)" class="btn btn-outline-danger">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data(){
        return{
            categories:[],
        }
    },
    methods:{
        get_all_categories(){
            axios.get('/category')
            .then(response =>{
                this.categories = response.data;
                // console.log(response.data);
            })
        },
        deleteCategory(category_id){
            axios.delete('/category/'+category_id)
            .then(res=>{
                this.get_all_categories();
                iziToast.warning({
                        title: 'Warning',
                        message: 'Category delete succesfully',
                    });
                // console.log(res);
            })
        }
    },
   mounted() {
       this.get_all_categories();
   },
}
</script>