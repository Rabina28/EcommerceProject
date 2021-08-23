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
    <h1 class="mb10">Create New Category</h1>
    <a href="{{url('admin/product')}}">
        <button type="button" class="btn btn-success">Back</button>

    </a>
    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.product.update',$model->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group col-md-12 mb-3">
                                <label for="product_name" class="control-label mb-1">Product Name</label>
                                <input id="product_name" value="{{$model->product_name}}" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>

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
                            <div class="form-group col-md-12 mb-3 ">
                                <label for="brand" class="control-label mb-1">Brand </label>
                                <input id="brand" value="{{$model->brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>

                            <div class="form-group col-md-12 mb-3">
                                <label for="quantity" class="control-label mb-1">Quantity </label>
                                <input id="quantity" value="{{$model->quantity}}" name="quantity" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="description" class="control-label mb-1">Description </label>
                                <textarea id="description"  name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$model->description}}</textarea>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="price" class="control-label mb-1">Price </label>
                                <input id="price" value="{{$model->price}}" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="rating" class="control-label mb-1">Rating </label>
                                <input id="rating" value="{{$model->rating}}" name="rating" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @if($model->image)
                                <img src="{{asset('assets/uploads/product/'.$model->image)}}" width="300px" alt="Product Image">
                            @endif
                            <div class="form-group col-md-6 mb-3">
                                <label for="image" class="control-label mb-1">Image </label>
                                <input id="image" value="{{url($model->image)}}" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
