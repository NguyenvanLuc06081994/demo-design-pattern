@extends('master.master')
@section('title','Add New Customer')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('customers.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Customer Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
