@extends('frontend.layout')
@section('title')
    {{$category->category_name}}
@endsection

@section('container')
    <div class="brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>{{$category->category_name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="brand-bg">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                        <div class="brand-box">
                            <i><img src="{{asset('assets/uploads/product/'.$product->image)}}" class="image" alt="Product Images"/></i>
                            <h3>{{$product->product_name}}</h3>
                            <h5>{{$product->description}}</h5>
                            <h5>{{$product->price}}</h5>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
