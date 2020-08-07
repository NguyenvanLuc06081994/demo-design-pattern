@extends('master.master')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('students.update',$student->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="name" value="{{$student->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>Student Birth Day</label>
                        <input type="date" class="form-control" name="date" value="{{$student->birthday}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Gender</label>
                        <input type="text" class="form-control" name="gender" value="{{$student->gender}}" required>
                    </div>
                    <div class="form-group">
                        <label>Student Address</label>
                        <input type="text" class="form-control" name="address" value="{{$student->address}}" required>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select name="class_id" id=""></select>
                        @foreach($classes as $key => $class)
                            <option @if($student->class_id == $class->id) {{'selected'}} @endif value="{{$class->id}}">{{{$class->name}}}</option>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Student Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
@endsection
