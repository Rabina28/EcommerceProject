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
    <h1 class="mb10">Create New Product</h1>
    <a href="{{url('admin/product')}}">
        <button type="button" class="btn btn-success">Back</button>

    </a>
        <div class="row m-t-30">
            <div class="table-responsive m-b-40">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div  class="col-md-12 mb-3">
                                    <label for="product_name" class="control-label mb-1">Product Name</label>
                                    <input id="product_name" value="{{old('product_name')}}" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="slug" class="control-label mb-1"> Slug</label>
                                    <input id="slug" value="{{old('slug')}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-select  col-md-6 mb-3">
                                    <label for="brand" class="control-label mb-1">Category</label>
                                    <select  class="form-control" name="category_id">
                                        <option value="">Select a category</option>
                                        @foreach($model as $item)
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="brand" class="control-label mb-1">Brand </label>
                                    <input id="brand" value="{{old('brand')}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="image" class="control-label mb-1">Image </label>
                                    <input id="image" value="{{old('image')}}" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="quantity" class="control-label mb-1">Quantity </label>
                                    <input id="quantity" value="{{old('quantity')}}" name="quantity" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="control-label mb-1">Description </label>
                                    <textarea id="description"  name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{old('brand')}}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="price" class="control-label mb-1">Price </label>
                                    <input id="price" value="{{old('price')}}" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="rating" class="control-label mb-1">Rating </label>
                                    <input id="rating" value="{{old('rating')}}" name="rating" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
