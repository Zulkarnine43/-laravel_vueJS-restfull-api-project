@extends('dashboard/dashboard_main_content')
@section('title_admin')
   Manage Product
@endsection
@section('dashboard_body')
@if (session('published_msg'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{session('published_msg')}}
</div>
@endif
@if (session('unpublished_msg'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{session('unpublished_msg')}}
</div>
@endif
    <table class="table table-bordered table-hover table-responsive">
        <h4 class="badge badge-info">Product Total: {{$Cout_products->count()}}</h4>
        <thead>
            <tr>
                <th>SN.</th>
                <th>Product Name</th>
                <th>Category id</th>
                <th>Product short description</th>
                <th>Product price</th>
                <th>Product Image</th>
                <th>Created Date </th>
                <th>Publication status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($products as $product )
            <tr>
                {{-- @php(print_r($loop)) --}}
                <td>{{ $loop->index+1}}</td>
                <td>{{$product->product_name}}</td>
                <td>{!!$product->realtionToCategory->category_name!!}</td>
                <td>{{$product->product_short_description}}</td>
                <td>{{$product->product_price}}</td>
                <td>
                    <img src="{{asset('uploads/product_images')}}/{{$product->product_image}}" class="img-fluid w-50" alt="">
                </td>
                <td>{{$product->created_at->diffForHumans()}}</td>

                <td>
                    @if($product->publication_status==1 )
                        Published
                    @else
                        Unpublished
                    @endif
                </td>
                <td>
                    <a href="{{route('edit_product',['id'=>$product->id])}}" class="btn btn-outline-warning">Edit</a>
                    <a href="{{route('delete_product',['id'=>$product->id])}}" class="btn btn-outline-danger">Delete</a>
                    @if($product->publication_status==1 )
                        <a href="{{route('unpublished_product',['id'=>$product->id])}}" class="btn btn-outline-info">Unpublished</a>
                    @else
                        <a href="{{route('published_product',['id'=>$product->id])}}" class="btn btn-outline-Primary">Published</a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
<br>
<br>
    <h2>Deleted Product</h2>
    <table class="table table-bordered table-hover table-responsive">
            <h4 class="badge badge-info">Deleted Total: {{$deleted_products->count()}}</h4>
        <thead>
            <tr>
                <th>SN.</th>
                <th>Product Name</th>
                <th>Category id</th>
                <th>Product short description</th>
                <th>Product price</th>
                <th>Created Date </th>
                <th>Publication status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($deleted_products as $deleted_product )
            <tr>
                {{-- @php(print_r($loop)) --}}
                <td>{{ $loop->index+1}}</td>
                <td>{{$deleted_product->product_name}}</td>
                <td>{!!$deleted_product->realtionToCategory->category_name!!}</td>
                <td>{{$deleted_product->product_short_description}}</td>
                <td>{{$deleted_product->product_price}}</td>
                <td>
                    <img src="{{asset('uploads/product_images')}}/{{$deleted_product->product_image}}" class="img-fluid w-50" alt="">
                </td>
                <td>{{$deleted_product->created_at->format('F j, Y, g:i:sa')}}</td>
                <td>
                    @if($deleted_product->publication_status==1 )
                        Published
                    @else
                        Unpublished
                    @endif
                </td>
                <td>
                    <a href="{{route('restore_product', ['id'=> $deleted_product->id ])}}" class="btn btn-outline-success">Restore</a>
                    <a href="{{route('forceDelete_product', ['id'=> $deleted_product->id ])}}" class="btn btn-outline-danger">Force Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$deleted_products->links()}}


@endsection()
