@extends('frontend.layout')

@section('title', $products->Slug)


@section('container')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{$products->categories->category_name}}/ {{$products->product_name}}</h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card-shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('assets/uploads/product/'.$products->image)}}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$products->product_name}}
                            @if($products->status =='1')
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <h5 class="me-3">price: Rs {{$products->price}}</h5>
                        <h5 class="mt-3">
                            {!! $products->description !!}
                        </h5>
                        <hr>
                        @if($products->quantity > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <input type="hidden" value="{{$products->id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn" >-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input text-center" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <br/><br/>
                                @if($products->quantity > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"><span class="fa fa-shopping-cart"></span>Add to Cart </button>
                                @else
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist  <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                        <div class="span9">
                            <ul id="productDetail" class="nav nav-tabs">
                                <li><a href="#review" data-toggle="tab">Product Reviews</a></li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="review">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <h4>Write a review</h4>
                                        <hr>
                                        <form method="POST" action="{{url('add-rating')}}" name="ratingForm" id="ratingForm">
                                            @csrf
                                            <input type="hidden" name="product_id" value="">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="product_rating" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="product_rating" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="product_rating" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="product_rating" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="product_rating" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Your Review</label>
                                                <textarea name="review" style="width: 300px; height: 50px;"></textarea>
                                            </div>
                                            <div>&nbsp;</div>
                                            <div class="form-group">
                                                <input type="submit" name="Submit">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Users review</h4>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

