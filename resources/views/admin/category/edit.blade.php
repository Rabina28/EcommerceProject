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
    <a href="{{url('admin/category')}}">
        <button type="button" class="btn btn-success">Back</button>

    </a>
    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.category.update',$model->id)}}" method="post" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="category_name" class="control-label mb-1">Category Name</label>
                                <input id="category_name" value="{{ $model->category_name }}"  name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @if($model->category_image)
                                <img src="{{asset('assets/uploads/category/'.$model->category_image)}}" width="300px" alt="Category Image">
                            @endif

                            <div class="col-md-6 mb-3">
                                <label for="category_image" class="control-label mb-1">Image</label>
                                <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="form-group">
                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                <input id="category_slug" value="{{ $model->category_slug}}"  name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('category_slug')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
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
