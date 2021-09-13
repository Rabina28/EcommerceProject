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
                        <h4>Registered Users Details
                        <a href="{{url('users')}}" class="btn btn-primary float-lg-right">Back
                        </a>
                        </h4>
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-4 mt-3">
                               <label for="">Role</label>
                               <div class="border p-2 border">{{$users->role_as == '0'? 'User' : 'Admin'}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">First Name</label>
                               <div class="border p-2 border">{{$users->name}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Last Name</label>
                               <div class="border p-2 border">{{$users->lname}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Email</label>
                               <div class="border p-2 border">{{$users->email}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Phone</label>
                               <div class="border p-2 border">{{$users->phone}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Address</label>
                               <div class="border p-2 border">{{$users->address}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">Country</label>
                               <div class="border p-2 border">{{$users->country}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">City</label>
                               <div class="border p-2 border">{{$users->city}}</div>
                           </div>
                           <div class="col-md-4 mt-3">
                               <label for="">State</label>
                               <div class="border p-2 border">{{$users->state}}</div>
                           </div>

                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
