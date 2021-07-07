@extends('layouts.master')
@section('title', 'Update status')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Cập nhật trạng thái</h1>
              <div class="col-12">
                <form method="post" action="{{route('status.update', $category->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Trạng thái
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('status.list')}}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
