@extends('admin.layout')
@section('title')
    Orders
@endsection
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4> Orders History
                            <a href="{{'orders'}}" class="btn btn-warning float-lg-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Order Date</th>
                                <th>Shipping Address</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                    <td>{{$item->address}}</td>
                                    <td>Rs.{{$item->total_price}}</td>
                                    <td>{{$item->status == '0' ?'pending' : 'completed'}}</td>
                                    <td>
                                        <a href="{{url('/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
