@extends('dashboard/dashboard_main_content')
@section('title_admin')
    Edit Category
@endsection
@section('dashboard_body')

    @if (session('Category_update_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{session('Category_update_message')}}
        </div>
    @endif

    @if($errors->all())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error )
                <ol>
                    <li>{{$error}}</li>
                </ol>
            @endforeach
        </div>
    @endif


<form action="{{route('update_category')}}" method="POST">
    @csrf
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
      <div class="col-sm-10">
        <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control form-control-lg" id="inputEmail3" placeholder="Enter Category Name">
        <input type="hidden" name="category_id" value="{{$category->id}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3"class="col-sm-2 col-form-label">Category Description</label>
      <div class="col-sm-10">

        <textarea id="input"  name="category_description"  class="form-control" rows="3">{{$category->category_description}}</textarea>

      </div>
    </div>
    <div class="form-group row">
            <div class="col-sm-2">Publication Status</div>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" name="publication_status" {{$category->publication_status == 1 ? 'Checked':''}} value="1" type="radio" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                 Published
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="publication_status"{{$category->publication_status == 0 ? 'Checked':''}} value="0" type="radio" id="unpublished">
                <label class="form-check-label" for="unpublished">
                  Unpublished
                </label>
              </div>
            </div>
          </div>


    <div class="form-group row">
        <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Category Add</button>
      </div>
    </div>
  </form>



@endsection()
