@extends('layouts.master')
@section('title','Add new agency')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h2>Thêm mới đại lý phân phối</h2>
            </div>
            <p class="text-success">{{isset($success) ? $success : ''}}</p>
            <div class="col-12">
                <form action="{{route('agencies.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputCode">Mã số đại lý
                            <input type="text" class="form-control" id="inputCode" name="code">
                        </label>
                        <div class="error-message">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên đại lý
                            <input type="text" class="form-control" id="inputName" name="name">
                        </label>
                        <div class="error-message">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Điện thoại
                            <textarea type="text" class="form-control" id="inputPhone"
                                      name="phone"></textarea>
                        </label>
                        <div class="error-message">
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email
                            <input type="email" class="form-control" id="inputEmail" name="email">
                        </label>
                        <div class="error-message">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Địa chỉ
                            <input class="form-control" id="inputAddress" name="address" type="text">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái
                            <select class="form-control" name="category">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    <a href="{{route('agencies.list')}}" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
