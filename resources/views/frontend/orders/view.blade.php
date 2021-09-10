@extends('frontend.layout')
@section('title')
    Order View
@endsection

@section('container')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4>Order View
                        <a href="{{url('my-order')}}" class="btn btn-warning text-white">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{$orders->address}}, <br>
                                    {{$orders->city}}, <br>
                                    {{$orders->state}}, <br>
                                    {{$orders->country}}, <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders->orderitems as $item)
                                                <tr>
                                                    <td>{{$item->products->product_name}}</td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>
                                                        <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="Product Image">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                <h4 class="px-2">Grand Total:<span class="float-lg-right">Rs.{{$orders->total_price}}</span> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
