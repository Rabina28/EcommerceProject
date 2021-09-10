@extends('admin.layout')

@section('container')
    @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <h1 class="mb10">Create New Contact</h1>
    <a href="{{url('admin/contact/')}}">
        <button type="button" class="btn btn-success">Back</button>

    </a>
        <div class="row m-t-30">
            <div class="table-responsive m-b-40">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.contact.store')}}" method="post" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" value="{{old('name')}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required autofocus>
                                    @error('category_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" placeholder="Phone" name="phone" id="phone" value="{{old('phone')}}" required autocomplete="phone" autofocus >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="address">Message</label>
                                        <textarea type="text" class="form-control" placeholder="Messsage" name="message" id="message"  style="height: 10rem" required autocomplete="message" >{{old('message')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
