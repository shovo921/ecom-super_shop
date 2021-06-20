<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super | Shop </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('fontend')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('fontend')}}/css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css"> 
   
   
 
    <script src="{{asset('fontend')}}/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('fontend')}}/css/toastr.min.css" type="text/css">
    <script src="{{asset('fontend')}}/js/toastr.min.js"></script>
   
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset('fontend')}}/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('fontend')}}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Bangla</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{url('/')}}l">HOME</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@supershop.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@supershop.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                            

                                
                                
                                @php
                                   $ln= app()->getLocale();
                                @endphp
                                @if ($ln =="bn")
                                <img src="{{asset('fontend')}}/img/bd.gif" alt="">
                                @else 
                                <img src="{{asset('fontend')}}/img/language.png" alt=""> 
                                @endif
                               

                                <div>{{app()->getLocale() == 'bn'?'Bangla' :'English'}}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    {{-- <li><a href="{{url('/',['lang'=>app()->getLocale() == 'bn'?'bn' :'en'])}}">{{app()->getLocale() == 'en'?'English' :'Bangla'}}</a></li> --}}
                                    <li><a href="lang/en">English</a></li> 
                                    <li><a href="lang/bn">Bangla</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                               
                                @auth
                                <div class="header__top__right__language">
                                    <i class="fa fa-user"></i>
                                    <div>{{Auth::user()->name}}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{route('login')}}">Profile</a></li>
                                        <li><a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>
     
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form></li>
                                    </ul>
                                </div>
                                @else
                                <div class="header__top__right__auth">
                                    <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if(session()->has('message'))  
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-flex align-items-center justify-content-start">
                  <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                  <span><strong>Well done!</strong>  {{ session()->get('message') }}</span>
                </div><!-- d-flex -->
              </div><!-- alert -->
              @endif
              @if(session()->has('login'))  
              <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="d-flex align-items-center justify-content-start">
                    <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
                    <span><strong>Hello</strong>  {{ session()->get('login') }}</span>
                  </div><!-- d-flex -->
                </div><!-- alert -->
                @endif
      
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="{{asset('fontend')}}/img/logo.png" alt=""></a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">{{ __('home.home')}}</a></li>
                            <li><a href="./shop-grid.html">{{ __('home.shop')}}</a></li>
                            <li><a href="#">{{ __('home.pages')}}</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">{{ __('home.blog')}}</a></li>
                            <li><a href="{{url('/contact')}}">{{ __('home.contact')}}</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">

                        @php
                            $total=App\Card::all()->where('user_ip',request()->ip())->sum(
                                function($t){
                                    return $t->price * $t->qty;
                                }
                            );
                            $shoping =App\Card::where('user_ip',request()->ip())->sum('qty');
                            if (Auth::check()) {
                                $wishlist =App\Wishlist::where('user_id',Auth::user()->id)->count('id');
                            }
                        @endphp
                        <ul>
                            <li><a href="{{route('show.wishlist')}}"><i class="fa fa-heart"></i> <span> 
                                @if (Auth::check())
                                {{$wishlist}}
                                @else
                                0
                            @endif
                        </span></a></li>
                            <li><a href="{{route('show.card')}}"><i class="fa fa-shopping-bag"></i> <span>{{$shoping}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>${{$total}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
   <!-- Hero Section Begin -->
   <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span> {{__('home.All_Categories')}}</span>
                    </div>
                    @php
                     $categorys=App\Category::where('status',1)->latest()->get();   
                    @endphp
                    <ul>
                        @foreach ($categorys as $category)
                        <li><a href="#">{{$category->category_name}}</a></li>
                        @endforeach
                      
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                               {{__('home.All_Categories')}}
                                
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="{{__('home.What do yo u need?')}}">
                            <button type="submit" class="site-btn"> {{__('home.SEARCH')}}</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+8801303802470</h5>
                            <span>{{__('home.support_time')}}</span>
                        </div>
                    </div>
                </div>

                @yield('banner')
            
            </div>
        </div>
    </div>
</section>

      <!-- content Section start --> 

      @yield('content')
       <!-- content Section end -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><{{asset('fontend')}}/img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>{{__('home.Join Our Newsletter Now')}}</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="{{route('subscribe.store')}}" method="POST">
                            @csrf
                            <input type="email" placeholder="Enter your mail" name="email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://shovo.netlify.com" target="_blank">shovo</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{asset('fontend')}}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('fontend')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('fontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('fontend')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('fontend')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('fontend')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('fontend')}}/js/mixitup.min.js"></script>
    <script src="{{asset('fontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('fontend')}}/js/main.js"></script>
    <script>
       @if(Session::has('lang_msg'))
         toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('lang_msg') }}");
  @endif


  @if(Session::has('msg'))
         toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('msg') }}");
  @endif
  @if(Session::has('error_msg'))
         toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('error_msg') }}");
  @endif

</script>

</body>

</html>