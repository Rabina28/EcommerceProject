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
    <h1 class="mb10">Product</h1>
    <a href="{{route('admin.product.create')}}">
        <button type="button" class="btn btn-primary">Add Product</button>

    </a>
    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{$list->categories->category_name}}</td>
                        <td>{{$list->product_name}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/product/'.$list->image)}}" width="200px" alt="Product image">
                        </td>
                        <td>{{$list->description}}</td>
                        <td>{{$list->price}}</td>

                        <td>
                            <form  method="post" action="{{ route('admin.product.destroy',$list->id) }}" class="delete_form">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="/admin/product/edit/{{$list->id}}" class="btn btn-xs btn-primary btn-sm">Edit</a>
                                <button class="btn btn-xs btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                                @if($list->status==1)
                                    <a href="{{url('admin/product/status/0')}}/{{$list->id}}" class="btn btn-xs btn-success btn-sm">Active</a>
                                @elseif($list->status==0)
                                    <a href="{{url('admin/product/status/1')}}/{{$list->id}}" class="btn btn-xs btn-warning btn-sm">Deactive</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection
