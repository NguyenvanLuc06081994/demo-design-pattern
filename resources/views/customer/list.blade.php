@extends('master.master')
@section('title','List Customer')
@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th colspan="2">Action</th>

        </tr>
        </thead>
        <tbody>
        @forelse($customers as $key => $customer)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->address}}</td>
            <td><a href="{{route('customers.edit',$customer['id'])}}" class="btn btn-primary">Edit</a></td>
            <td><a onclick="return confirm('are you sure?')" href="{{route('customers.destroy',$customer['id'])}}" class="btn btn-danger">Delete</a></td>
        </tr>
        @empty
            <tr>
                <td>NO DATA</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
