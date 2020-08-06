@extends('master.master')
@section('title','Add New Student')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('students.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Student Birth Day</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Gender</label>
                        <input type="text" class="form-control" name="gender" placeholder="Enter gender" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <select name="class_id" id="">
                            @foreach($classes as $key => $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Student Image</label>
                        <input type="file" name="image" class="form-control-file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">ADD</button>
                </form>
            </div>
        </div>
    </div>
@endsection
