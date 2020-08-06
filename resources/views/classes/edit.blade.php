@extends('master.master')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Form Edit</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('classes.edit',$class->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" name="name" value="{{$class->name}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </form>
            </div>
        </div>
    </div>
@endsection
