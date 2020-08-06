@extends('master.master')
@section('title','Student List')
@section('content')
    <a href="{{route('students.create')}}" class="btn btn-primary">ADD NEW STUDENT</a>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Birth Day</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">Class</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($students as $key => $student)
        <tr>
            <td>{{++$key}}</td>
            <td><img src="{{asset('storage/'.$student->image)}}" alt=""></td>
            <td>{{$student->name}}</td>
            <td>{{$student->birthday}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->class_id}}</td>
            <td><a href="{{route('students.edit',$student->id)}}">EDIT</a></td>
            <td><a onclick="return confirm('are you sure?')" href="{{route('students.destroy',$student->id)}}">DELETE</a></td>
        </tr>
        @empty
            <tr>
                <td>NO DATA</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
