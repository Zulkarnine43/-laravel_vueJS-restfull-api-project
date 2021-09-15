<template>
    <div>
        <h2 class="text-center mb-3">Category Add</h2>
         <form @submit.prevent="category_add()">
                <div class="form-group row">
                  <label for="category_name" class="col-sm-2 col-form-label">Category name</label>
                  <div class="col-sm-10">
                    <input type="text"  v-model="form.category_name" class="form-control" name="category_name" id="category_name" :class="{ 'is-invalid': form.errors.has('category_name') }" placeholder="Enter Category Name">
                    <has-error :form="form" field="category_name"></has-error>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="category_description" class="col-sm-2 col-form-label">Category Description</label>
                  <div class="col-sm-10">
                   <textarea name="category_description" v-model="form.category_description"  :class="{ 'is-invalid': form.errors.has('category_description') }" class="form-control" id="category_description" cols="4" rows="4"></textarea>
                   <has-error :form="form" field="category_description"></has-error>
                  </div>
                </div>
                
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.publication_status" :class="{ 'is-invalid': form.errors.has('publication_status') }" type="radio" name="publication_status" id="publication_status" value="1" checked>
                        <has-error :form="form" field="publication_status"></has-error>
                        <label class="form-check-label"  for="publication_status">
                         Publicshed
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" v-model="form.publication_status" type="radio" name="publication_status" :class="{ 'is-invalid': form.errors.has('publication_status') }" id="unpublished" value="0">
                        <has-error :form="form" field="publication_status"></has-error>
                        <label class="form-check-label" for="unpublished">
                         Unpublished
                        </label>
                      </div>
                    </div>
                  </div>
                </fieldset>
               
                <div class="form-group row">
                  <div class="col-sm-2">
                   
                  </div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </div>
                </div>
              </form>
    </div>
</template>
<script>
export default {
  data() {
    return {
      form:new Form({
        category_name:null,
        category_description:null,
        publication_status:null,
      }),
    }
  },
  methods: {
    category_add(){
       this.form.post('/category', this.form)
        .then( response => {
          iziToast.success({
              title: 'OK',
              message: 'Successfully inserted record!',
          });
          this.$router.push({name:'all-category'});
          // console.log(response);
        })
        .catch(function (error) {
          
          console.log(error);
        });
    },
  },
}
</script>
