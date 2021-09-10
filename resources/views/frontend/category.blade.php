@extends('frontend.layout')
@section('title')
    Category page.
@endsection

@section('container')
    <div class="trending">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category as $cate)
                    <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 ">
                        <a href="{{url('view-category/'.$cate->category_slug)}}">
                            <div class="trending-box">
                                <figure><img src="{{asset('assets/uploads/category/'.$cate->category_image)}}" /></figure>
                                <h3>{{$cate->category_name}}</h3>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>

@endsection
