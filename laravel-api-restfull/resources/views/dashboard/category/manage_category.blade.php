@extends('dashboard/dashboard_main_content')
@section('title_admin')
   Manage Category
@endsection
@section('dashboard_body')
@if (session('publish_message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{session('publish_message')}}
</div>
@endif
@if (session('Unpublish_message'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{session('Unpublish_message')}}
</div>
@endif
    <table class="table table-bordered table-hover">
        <h4 class="badge badge-info">Category Total: {{$categories->count()}}</h4>
        <thead>
            <tr>
                <th>SN.</th>
                <th>Category Name</th>
                <th>Category description</th>
                <th>Created Date </th>
                <th>Publication status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
            <tr>
                {{-- @php(print_r($loop)) --}}
                <td>{{ $loop->index+1}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->category_description}}</td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>
                    @if($category->publication_status==1 )
                        Published
                    @else
                        Unpublished
                    @endif


                </td>
                <td>
                    <a href="{{route('category_edit',['id'=>$category->id,'Cat_name'=>$category->category_name])}}" class="btn btn-outline-warning">Edit</a>
                    <a href="{{route('category_delete',['id'=>$category->id])}}" class="btn btn-outline-danger">Delete</a>
                    @if($category->publication_status==1 )
                        <a href="{{route('category_unpublish',['id'=>$category->id])}}" class="btn btn-outline-info">Unpublished</a>
                    @else
                        <a href="{{route('category_publish',['id'=>$category->id])}}" class="btn btn-outline-Primary">Published</a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{-- {{$categories->links()}} --}}

@endsection()
