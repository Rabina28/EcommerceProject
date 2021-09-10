@extends('frontend.layout')
@section('title')
    Checkout
@endsection

@section('container')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Home
                </a>/
                <a href="{{url('checkout')}}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                              <div class="col-md-6">
                                  <label for="">First Name</label>
                                  <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                              </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter Your Email">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->address}}" name="address" placeholder="Enter Your Address">
                                </div>
                                <div class="col-md-6">
                                    <label for=""> City</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6">
                                    <label for=""> State</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->state}}" name="state" placeholder="Enter Your State">
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Country</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->country}}" name="country" placeholder="Enter Your Country">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th> Quantity</th>
                                    <th> Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartitems as $item)
                                    <tr>
                                        <td>{{$item->products->product_name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td>Rs.{{$item->products->price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary float-lg-right">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
