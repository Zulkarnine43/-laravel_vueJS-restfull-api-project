@extends('layouts.frontent_master')
@section('title')
Shipping info
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header  mb-3 text-center text-warning">
                        Dear <strong class="text-dark">{{Session::get('customer_name')}}</strong>  .You have to give us product shipping info to complete your valuable order.if your billing info are same then just press on save shipping info button
                    </div>
                </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto mb-5 ">
            <div class="card">
                <div class="card-header">
                   Shipping info goes here...
                </div>
                <div class="card-body">
                    <form action="{{route('save_shipping')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <input  class="form-control" type="text" name="full_name"
                                value="{{$customer->first_name.' '.$customer->last_name}}" placeholder="Enter your Full Name" >
                        </div>
                        <div class="form-group">
                            <input id="email_address" class="form-control" type="text" name="email_address"
                                value="{{$customer->email_address}}" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <input id="phone_number" class="form-control" type="text" name="phone_number"
                                value="{{$customer->phone_number}}" placeholder="Enter Your Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" id="address" cols="30"
                                rows="2" placeholder="Enter Your full address ">{{$customer->address}}</textarea>
                        </div>
                        <input class="btn btn-success btn-lg " type="submit" value="Update shipping info">
                        @if (Session::get('shipping_id'))
                             <a href="{{route('checkout_payment')}}" class="btn btn-info btn-lg float-right" type="submit" >Go Payment</a>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
