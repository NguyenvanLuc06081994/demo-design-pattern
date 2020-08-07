@extends('master.master')
@section('title','Student List')
@section('content')
    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </p>
        @endif
    </div>
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
            <td>{{$student->class->name}}</td>
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
    <div class="modal fade" id="cityModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('students.filterByClass') }}" method="get">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Lọc theo khóa học -->
                        <div class="select-by-program">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh thành</label>
                                <div class="col-sm-7">
                                    <select class="custom-select w-100" name="city_id">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($classes as $class)
                                            @if(isset($classFilter))
                                                @if($class->id == $classFilter->id)
                                                    <option value="{{$class->id}}" selected >{{ $class->name }}</option>
                                                @else
                                                    <option value="{{$class->id}}">{{ $class->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{$class->id}}">{{ $class->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!--End-->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary" >Chọn</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
