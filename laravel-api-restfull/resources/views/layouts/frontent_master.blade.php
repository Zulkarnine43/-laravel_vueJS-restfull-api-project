<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front-end/css/bootstrap.min.css')}}">
    <!-- MAIN CSS-->
    <link rel="stylesheet" href="{{asset('front-end/css/main.css')}}">
    <!--my responsive-->
    <link rel="stylesheet" href="{{asset('front-end/css/responsive.css')}}">
    <!--- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/css/meanmenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('front-end/css/nice-select.css')}}">
    <!--- awl carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/css/owl.carousel.min.css')}}">
    <title>@yield('title')</title>
</head>

<body>
    <!-- Header Area -->
    <div class="header-section">
        <div class="container position-relative">
            <div class="row">
                <div class="col-xl-5 col-md-12 my-xl-5 mb-0 my-sm-3  position-static ">
                    <div class="main-menu d-none d-md-block">
                        <nav>
                            <ul>
                                <li><a href="{{url('/')}}">Home </i></a></li>
                                <li><a href="{{route('shop')}}">Shop</a></li>
                                <li><a href="">Menu <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a>
                                            <ul class="submenu">
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a> </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Blogs</a>
                                    <div class="mega-menu">
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="position-static"><a href="#">About Us</a>
                                    <div class="mega-menu mega-full">
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                        <ul>
                                            <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                            <li><a href="#">Mega menu Item</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu d-md-none">
                        <nav id="mobile-menu-active">
                            <ul>
                                <li><a href="#">Home <i class="fas fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a></li>
                                        <li><a href="#">Submenu item 1</a>
                                            <ul class="submenu">
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a></li>
                                                <li><a href="#">Submenu item 1</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a></li>
                                                        <li><a href="#">Submenu item 1</a> </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Blogs</a>
                                    <ul class="mega-menu">
                                        <li class="mega-title"><a href="#">Mega menu Tilte</a></li>
                                        <li><a href="#">Mega menu Item</a></li>
                                        <li><a href="#">Mega menu Item</a></li>
                                        <li><a href="#">Mega menu Item</a></li>
                                        <li><a href="#">Mega menu Item</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Submenu item 1</a> </li>
                                <li><a href="#">Submenu item 1</a> </li>
                                <li><a href="#">Submenu item 1</a> </li>
                                <li><a href="#">Submenu item 1</a> </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-12 text-center mb-0  my-xl-5 ">
                    <div class="">
                        <a href="{{url('/')}}" class="text-center"><img width="175" height="45" src="{{asset('front-end')}}/img/logo.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-8 col-sm-12 mb-0  my-xl-5 text-center text-md-right position-relative">
                    <div class="header-right">
                        <ul>
                            @if (session('customer_id'))
                                <li>
                                    <a href="{{route('logout_submit')}}">logout</a>
                                    {{-- <form action="{{route('logout_submit')}}" id="logout_submit" method="post">
                                        @csrf
                                    </form> --}}
                                </li>

                            @else
                                <li><a href="{{route('checkout_form')}}">Login</a></li>

                            @endif


                            <li><a href="#"><i class="fas fa-heart"></i> (0)</a></li>
                            <li><a href="#">cart({{$Cart_TotalQuantity}})</a>
                                <div class="card-hover  p-3">
                                    {{-- {{print_r($Cart_contents)}} --}}

                                        <table class="table table-dark table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="h-100">image</th>
                                                            <th>name</th>
                                                            <th>price</th>
                                                            <th>Action</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                 @foreach ($Cart_contents as $Cart_content)
                                                    <tr>
                                                        <td> <img style="width:100%;height:65px" src="{{asset('uploads/product_images')}}/{{$Cart_content->attributes->product_image}}"  alt=""></td>
                                                        <td> <p>{{$Cart_content->name}}</p></td>
                                                        <td>${{$Cart_content->price}}<br>
                                                       total: ${{$Cart_content->price*$Cart_content->quantity}}
                                                        </td>
                                                        <td  class="position-relative">
                                                            <a  class="d-inline position-absolute" href="{{route('cart_remove_item',['pro_id'=>$Cart_content->id])}}" style="top:-23px;right:13px;"><i class="fas fa-trash-alt text-danger"></i></a>
                                                            <form action="{{route('cart_update')}}" method="post" class="mt-4">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input class="w-100 form-control" type="Number" value="{{$Cart_content->quantity}}" min="1" name="product_quantity">
                                                                    <input class="w-100" type="hidden" value="{{$Cart_content->id}}" name="product_id">

                                                                    <label for="my-input">
                                                                        <button type="submit" class="btn btn-outline-light mt-1">Update</button>
                                                                    </label>
                                                                </div>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                    <div class="total-price clearfix">
                                        <span class="float-left total-left">Total:</span>
                                        <span class="float-right total-right">$ {{$Cart_subtotal}}</span>
                                        @php
                                            Session::put(['total_price'=>$Cart_subtotal]);
                                        @endphp
                                    </div>
                                    <a href="{{route('checkout_form')}}" class="check-out-botton">Check out</a>
                                </div>
                            </li>
                            <li><a href="#"><i class="fas fa-search"></i></a>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
            @if(session('cart_item_null_msg'))
                <div class="alert alert-primary w-100" role="alert" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('cart_item_null_msg')}}
                </div>
            @endif
    </div>
</div>




    @yield('content')











     <!--Footer-section start-->
     <footer>
            <div class="container">
                <div class="footer-area">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mb-sm-5">
                            <div class="footer-widget">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">News & Stories</a></li>
                                    <li><a href="#"> History</a></li>
                                    <li><a href="#">Our Studio</a></li>
                                    <li><a href="#">Showrooms</a></li>
                                    <li><a href="#">Stockists</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-sm-5">
                            <div class="footer-widget">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">News & Stories</a></li>
                                    <li><a href="#"> History</a></li>
                                    <li><a href="#">Our Studio</a></li>
                                    <li><a href="#">Showrooms</a></li>
                                    <li><a href="#">Stockists</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 ">
                            <div class="footer-widget">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">News & Stories</a></li>
                                    <li><a href="#"> History</a></li>
                                    <li><a href="#">Our Studio</a></li>
                                    <li><a href="#">Showrooms</a></li>
                                    <li><a href="#">Stockists</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 ">
                            <div class="footer-widget">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">News & Stories</a></li>
                                    <li><a href="#"> History</a></li>
                                    <li><a href="#">Our Studio</a></li>
                                    <li><a href="#">Showrooms</a></li>
                                    <li><a href="#">Stockists</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-8 ">
                            <div class="footer-menu  d-flex align-items-center ">
                                <nav class="">
                                    <ul>
                                        <li><a href="#">About Us </a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="#">Order Tracking</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4 ">
                            <div class="footer-icon d-flex justify-content-end align-items-center">
                                <span>Connect with us:</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-skype"></i></a>
                                <a href="#"><i class="fab fa-skype"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer-section End-->

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('front-end/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('front-end/js/popper.min.js')}}"></script>
        <script src="{{asset('front-end/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('front-end/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('front-end/js/jquery.meanmenu.min.js')}}"></script>
        <script src="{{asset('front-end/js/slick.min.js')}}"></script>
        <script src="{{asset('front-end/js/jquery.nice-select.min.js')}}"></script>

        <!-- My Js-->
        <script src="{{asset('front-end/js/main.js')}}"></script>
    </body>

    </html>
