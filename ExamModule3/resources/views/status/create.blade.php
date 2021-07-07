@extends('layouts.master')
@section('title', 'Thêm mới trạng thái')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới trạng thái</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('status.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Trạng thái
                            <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('status.list')}}">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
