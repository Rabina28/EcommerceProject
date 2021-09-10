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
                @foreach($products as $prod)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                        <div class="brand-box">
                            <i><img src="{{asset('assets/uploads/product/'.$prod->image)}}"  alt="Product Images"/></i>
                            <h3>{{$prod->product_name}}</h3>
                            <h5>{{$prod->description}}</h5>
                            <h5>{{$prod->price}}</h5>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection
