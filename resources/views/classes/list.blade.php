@extends('master.master')
@section('title','List Class')
@section('content')
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Class Name</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($classes as $key => $class)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$class->name}}</td>
                <td><a href="{{route('classes.edit',$class->id)}}">EDIT</a></td>
            </tr>
        @empty
            <tr>
                <td>NO DATA</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
