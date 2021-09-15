@extends('dashboard/dashboard_main_content')
@section('title_admin')
Add Product
@endsection
@section('dashboard_body')

@if (session('product_add_msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('product_add_msg')}}
    </div>
@endif



<form action="{{route('product_save')}}" method="POST" name='test' enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" value="{{old('product_name')}}" name="product_name" class="form-control " id="inputEmail3"
                placeholder="Enter Category Name">
            @foreach ($errors->get('product_name') as $message )
            <span class="text-danger">{{$message}}</span>
            @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="for_category" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control" id="for_category" >
                <option value="">--- Select A Category---</option>
                @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            @if ($errors->has('category_id'))
            <span class="text-danger"> Select a Category</span>

            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Product Short Description</label>
        <div class="col-sm-10">
            <textarea  name="product_short_description" class="form-control" rows="3">{{old('product_short_description')}}</textarea>
            @foreach ($errors->get('product_short_description') as $message )
            <span class="text-danger">{{$message}}</span>
              @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Product Long Description</label>
        <div class="col-sm-10">
            <textarea id="summary-ckeditor" name="product_long_description" value="" class="form-control" rows="3">{{old('product_long_description')}}</textarea>
            @foreach ($errors->get('product_long_description') as $message )
           <span class="text-danger">{{$message}}</span>
              @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
        <div class="col-sm-10">
            <input type="text" name="product_price" value="{{old('product_price')}}" class="form-control " id="product_price">
            @foreach ($errors->get('product_price') as $message )
            <span class="text-danger">{{$message}}</span>
              @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="product_price" class="col-sm-2 col-form-label">Photos Upload</label>
        <div class="col-sm-10">
            <input type="file" name="product_image" class="form-control " id="product_price">
            @foreach ($errors->get('product_image') as $message )
            <span class="text-danger">{{$message}}</span>
              @endforeach
        </div>
    </div>
    <div class="form-group row">
        <label for="product_price" class="col-sm-2 col-form-label">Multiple file</label>
        <div class="col-sm-10">
            <input type="file" name="product_sub[]" class="form-control " id="product_price" multiple>
            @if ($errors->has('product_sub[]'))
            <span class="text-danger"> Select  image</span>

            @endif
           
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">Publication Status</div>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input"  name="publication_status" value="1" type="radio" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                    Published
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="publication_status" value="0" type="radio" id="unpublished">
                <label class="form-check-label" for="unpublished">
                    Unpublished
                </label>
            </div>
            @foreach ($errors->get('publication_status') as $message )
            <span class="text-danger">{{$message}}</span>
              @endforeach
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Category Add</button>
        </div>
    </div>
</form>
<script>
     document.forms['test'].elements['category_id'].value= {{old('category_id')}};
</script>

@endsection()
