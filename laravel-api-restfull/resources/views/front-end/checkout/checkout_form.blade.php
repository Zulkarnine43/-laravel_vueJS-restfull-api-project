@extends('layouts.frontent_master')
@section('title')
Chekout Form
@endsection
@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Resister, if you are not Register betore!
                    </div>
                    <div class="card-body">
                        <form action="{{route('customer_signup')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" class="form-control" type="text" name="first_name"
                                    value="{{old('first_name')}}" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" class="form-control" type="text" name="last_name"
                                    value="{{old('last_name')}}" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input id="email_address" class="form-control" type="text" name="email_address"
                                    value="{{old('email_address')}}" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="phone_number"> Phone Number</label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number"
                                    value="{{old('phone_number')}}" placeholder="Enter Your Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password"
                                    value="{{old('password')}}" placeholder="Enter Your Password">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" cols="30"
                                    rows="2" placeholder="Enter Your full address ">{{old('address')}}</textarea>
                            </div>
                            <input class="btn btn-success btn-lg btn-block" type="submit" value="Resister">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <ol>
                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>

                            @endforeach
                        </ol>
                    </div>
                @endif
                @if (session('worng_message'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                           {{session('worng_message')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                 @endif
                <div class="card">
                    <div class="card-header">
                       Already Registered? Login here!
                    </div>
                    <div class="card-body">
                        <form action="{{route('customer_login')}}" method="post" >
                           @csrf

                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input id="email_address" class="form-control" type="text" name="email_address"
                                    value="{{old('email_address')}}" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password"
                                    value="{{old('password')}}" placeholder="Enter Your Password">
                            </div>

                            <input class="btn btn-success btn-lg btn-block" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
