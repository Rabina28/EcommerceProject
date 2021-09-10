@extends('frontend.layout')
@section('title')
    Contact Us
@endsection

@section('container')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Home
                </a>/
                <a href="{{url('contactus')}}">
                    Contact Us
                </a>
            </h6>
        </div>
    </div>
    <div class="trending">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Contact Us </h2>
                        <p>
                            Leave a message if you have any questions, suggestions to our services.
                            We will acknowledge and get back to you soon as soon as possible.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                <form action="{{route('frontend.contact.contactstore')}}" method="POST" >
                    {{ csrf_field() }}

                    <div class="col-md-6 mb-3">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name"  name="name" type="text" placeholder="Enter your name" class="form-control" aria-required="true" aria-invalid="false" required autofocus>
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" placeholder="Enter your Phone" name="phone" id="phone"  required autocomplete="phone" autofocus >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter your Email" name="email" id="email" required autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="address">Message</label>
                            <textarea type="text" class="form-control" placeholder="Enter your Messsage" name="message" id="message"  style="height: 10rem" required autocomplete="message" >{{old('message')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Send Message</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>



@endsection
