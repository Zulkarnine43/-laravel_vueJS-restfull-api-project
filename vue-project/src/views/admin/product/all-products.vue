<template>
    <div>
       <div class="btn btn-outline-success float-right" @click="addProductModal">Add Product</div>
       <table class="table table-border table-hover">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Product name</th>
                   <th>Product category</th>
                   <th>Product short description</th>
                   <th>Product price</th>
                   <th>Product image</th>
                   <th>Created at</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               <tr v-for="(product, index) in products.data" :key="index">
                   <td scope="row">{{product.id}}</td>
                   <td>{{product.product_name}}</td>
                   <td>{{product.category_id}}</td>
                   <td>{{product.product_short_description}}</td>
                   <td>{{product.product_price}} TK</td>
                   <td>
                        <img  :src="'http://localhost/api-restfull/public/uploads/product_images/'+product.product_image" class="img-fluid"/>
                   </td>
                   <td>{{product.created_at}}</td>
                   <td>
                       <div class="btn-gorup">
                           <div @click="editProductModal(product)" class="btn btn-outline-warning">Edit</div>
                           <div @click="product_delete(product.id)" class="btn btn-outline-danger">Del</div>
                       </div>
                   </td>
               </tr>
           </tbody>
       </table>
<pagination :data="products" @pagination-change-page="getResults"></pagination>
        <!--Product Modal -->
        <div class="modal fade" id="product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <form @submit.prevent=" editMode ? product_update() : product_add()">
                        <div class="modal-header">
                            <h5 v-if="editMode" class="modal-title text-success" >Product Update</h5>
                            <h5 v-else class="modal-title text-success" >Product Add</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name" v-model="form.product_name" :class="{ 'is-invalid': form.errors.has('product_name') }" placeholder="Enter Product name">
                                    <has-error :form="form" field="product_name"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Product Category</label>
                                    <select class="form-control" id="category_id" v-model="form.category_id" :class="{ 'is-invalid': form.errors.has('category_id') }">
                                        <option value="">------Select a Category------</option>
                                        <option v-for="(category, index) in categories" :key="index" :value="category.id" >{{category.category_name}}</option>
                                    </select>
                                    <has-error :form="form" field="category_id"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="product_short_description">Product short description</label>
                                    <textarea name="product_short_description" id="product_short_description" v-model="form.product_short_description" :class="{ 'is-invalid': form.errors.has('product_short_description') }" cols="30" rows="2" class="form-control" placeholder="Product short description"></textarea>
                                    <has-error :form="form" field="product_short_description"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="product_long_description">Product long description</label>
                                    <textarea name="product_long_description" id="product_long_description" v-model="form.product_long_description" :class="{ 'is-invalid': form.errors.has('product_long_description') }" cols="30" rows="4" class="form-control" placeholder="Product long description"></textarea>
                                    <has-error :form="form" field="product_long_description"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Product Price</label>
                                    <input type="number" name="product_price" id="product_price" v-model="form.product_price" :class="{ 'is-invalid': form.errors.has('product_price') }" placeholder="Product Price" class="form-control">
                                    <has-error :form="form" field="product_price"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Product Image</label><br>
                                    <!-- <img :src="form.product_image" alt="" class="img-fluid"> -->
                                    <img :src="imageUpdateMode ? 'http://localhost/api-restfull/public/uploads/product_images/'+form.product_image : form.product_image" alt="" class="img-fluid">
                                    <div v-if="!form.product_image" class="custom-file">
                                        <input type="file" @change="FileChangeEvent" class="custom-file-input" id="product_image">
                                        <label class="custom-file-label" for="product_image">Choose file...</label>
                                    </div>
                                    <div v-else>
                                        <button @click="RemoveImage" type="button" class="btn btn-outline-warning mt-2">Remove image</button>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="publication_status">Publication Status</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="published" value="1" name="publication_status" v-model="form.publication_status" :class="{ 'is-invalid': form.errors.has('publication_status') }" >
                                        <label class="custom-control-label" for="published">Published</label>
                                        <has-error :form="form" field="publication_status"></has-error>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="unpublished" value="0" name="publication_status" v-model="form.publication_status" :class="{ 'is-invalid': form.errors.has('publication_status') }">
                                        <label class="custom-control-label" for="unpublished">Unpublished</label>
                                        <has-error :form="form" field="publication_status"></has-error>
                                    </div>

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-if="editMode" type="submit" class="btn btn-primary">Product Update</button>
                            <button v-else type="submit" class="btn btn-primary">Product Add</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>


    </div>
</template>
<script>
export default {
    data() {
        return {
            products:[],
            categories:[],
            editMode:false,
            imageUpdateMode: false,
             form: new Form({
                 id:'',
                product_name: '',
                category_id: '',
                product_short_description: '',
                product_long_description: '',
                product_price: '',
                product_image: '',
                publication_status: '',
            })
        }
    },
    methods:{
          getResults(page = 1) {
			axios.get('/all-product?page=' + page)
				.then(response => {
					this.products = response.data;
				});
		},
        FileChangeEvent(e){
             this.imageUpdateMode = false;
            var file = e.target.files[0];
            const reader = new FileReader();
            // console.log(file['size']);
            if(file['size'] < 2097152 ){
                 reader.onload = ()=>{
                    this.form.product_image = reader.result
                    iziToast.success({
                        title: 'success',
                        message: 'product Image is Ok = '+file['size'] / 1048576 +"MB",
                    });
                }
                reader.readAsDataURL(file);   
            }else{
                iziToast.error({
                    title: 'Warning',
                    message: 'product Image is large = '+file['size'] / 1048576 +"MB",
                });
            }
            
        },
        RemoveImage(){
            this.imageUpdateMode = false;
            this.form.product_image = '';
        },
        get_all_product(){
           axios.get('/all-product')
            .then(response =>{
                // handle success
                this.products = response.data;
                // console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .finally(function () {
                // always executed
            }); 
        },
        get_all_categories(){
             axios.get('category')
            .then(response =>{
                // handle success
                this.categories = response.data;
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        },
        addProductModal(){
             this.editMode = false;
             this.form.reset();
              $('#product_modal').modal('show')
        },
        product_add(){
            this.form.post('all-product')
            .then(response =>{
                this.get_all_product();
                $('#product_modal').modal('hide')
                iziToast.success({
                        title: 'Warning',
                        message: 'product add succesfully',
                    });
            })
        },
        product_delete(product_id){
                axios.delete("all-product/"+product_id)
                .then(response =>{
                    this.get_all_product();
                     iziToast.error({
                        title: 'Warning',
                        message: 'product Delete successfully',
                    });
                })
        },
        editProductModal(product){
            this.imageUpdateMode = true;
            this.editMode = true;
             $('#product_modal').modal('show')
             this.form.fill(product);
        },
        product_update(){
            this.form.put("all-product/"+this.form.id)
            .then(response =>{
                this.get_all_product();
                $('#product_modal').modal('hide')
                iziToast.success({
                    title: 'Success',
                    message: 'product Update successfully',
                });
            })
              
        },
    },
    created() {
        this.get_all_product();
        this.get_all_categories();
        this.getResults();
    },
}
</script>