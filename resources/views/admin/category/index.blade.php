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
    <h1 class="mb10">Category</h1>
    <a href="{{route('admin.category.create')}}">
        <button type="button" class="btn btn-primary">Add Category</button>

    </a>
    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->category_name}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/category/'.$list->category_image)}}" width="100px" alt="Image here">
                    </td>
                    <td>{{$list->category_slug}}</td>
                    <td>
                        <form  method="post" action="{{ route('admin.category.destroy',$list->id) }}" class="delete_form">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="/admin/category/edit/{{$list->id}}" class="btn btn-xs btn-primary">Edit</a>
                            <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                            @if($list->status==1)
                                <a href="{{url('admin/category/status/0')}}/{{$list->id}}" class="btn btn-xs btn-success">Active</a>
                            @elseif($list->status==0)
                                <a href="{{url('admin/category/status/1')}}/{{$list->id}}" class="btn btn-xs btn-warning">Deactive</a>
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
