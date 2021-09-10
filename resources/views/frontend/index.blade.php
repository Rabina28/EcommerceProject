@extends('frontend.layout')
@section('title')
   Furniture Ecommerce
@endsection

@section('container')
    <section class="slider_section">
        <div class="banner_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="text-img">
                            <figure><img src="{{asset('frontend_assets/images/home.jpg')}}"/></figure>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mapimg">
                        <div class="text-bg">
                            <h1>The Best <br> <strong class="black_bold">Furniture Designs</strong><br></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- trending -->
    <div class="trending">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Trending <strong class="black">Categories</strong></h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="brand-bg">
                    <div class="row">
                        @foreach($trending_category as $tcategory)
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                                <div class="brand-box">
                                    <i><img src="{{asset('assets/uploads/category/'.$tcategory->category_image)}}" class="image" alt="Product Images"/></i>
                                    <h3>{{$tcategory->category_name}}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end trending -->

    <!-- our brand -->
    <div class="brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Featured <strong class="black">Products</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="brand-bg">
            <div class="row">
                <!-- <div class="owl-carousel featured-product-carousel owl-theme">-->
                    @foreach($featured_products as $product)
                        <!--  <div class="item mt-3"> -->
                       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                            <div class="brand-box">
                                <a href="{{url('product/'.$product->Slug)}}">
                                <i><img src="{{asset('assets/uploads/product/'.$product->image)}}" class="image" alt="Product Images"/></i>
                                <h3>{{$product->product_name}}</h3>
                                <h5>{{$product->description}}</h5>
                                <h5>{{$product->price}}</h5>
                                <br/>
                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>AddToCart</a>
                                 </a>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <!-- end our brand -->
    <!-- map -->
    <div class="contact">
        <div class="container-fluid padddd">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Contact <strong class="black">Us</strong></h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 padddd">
                    <div class="map_section">
                        <div id="map">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 padddd">
                    <form class="main_form">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Name" type="text" name="Name">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Email" type="text" name="Email">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Phone" type="text" name="Phone">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <button class="send">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end map -->
@endsection

<!---
@section('scripts')
    <script>
        $(document).ready(function (){
            $('.featured-product-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });
        });
    </script>
@endsection

-->
