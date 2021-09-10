@extends('frontend.layout')
@section('title')
   Product page.
@endsection

@section('container')

    <div class="brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>All <strong class="black">Products</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="brand-bg">
            <div class="row">
                <!-- <div class="owl-carousel featured-product-carousel owl-theme">-->
            @foreach($product as $products)
                <!--  <div class="item mt-3"> -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                        <div class="brand-box">
                            <a href="{{url('product/'.$products->Slug)}}">
                                <i><img src="{{asset('assets/uploads/product/'.$products->image)}}" class="image" alt="Product Images"/></i>
                                <h3>{{$products->product_name}}</h3>
                                <h5>{{$products->description}}</h5>
                                <h5>{{$products->price}}</h5>
                                <br/>
                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>AddToCart</a>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
