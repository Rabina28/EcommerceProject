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
    <h1 class="mb10">Contact</h1>
    <a href="{{route('admin.contact.create')}}">
        <button type="button" class="btn btn-primary">Add contact</button>

    </a>
    <div class="row m-t-30">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th style="width:200px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contact as $data)
                <tr>
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->message }}</td>
                    <td>
                        <form  method="post" action="{{ route('admin.contact.destroy',$data->id) }}" class="delete_form">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="/admin/contact/edit/{{$data->id}}" class="btn btn-xs btn-primary">Edit</a>
                            <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
