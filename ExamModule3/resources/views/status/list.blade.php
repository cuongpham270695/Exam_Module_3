@extends('layouts.master')
@section('title', 'Add new status')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Add new status</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('status.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Status
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
