@extends('layouts.master')
@section('title','Chỉnh sửa thông tin đại lý')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h3>Chỉnh sửa thông tin đại lý</h3>
            </div>
            <div class="col-12">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check"
                           aria-hidden="true"></i>{{\Illuminate\Support\Facades\Session::get('success')}}
                    </p>
                @endif
            </div>
            <div class="col-12 container">
                <form action="{{route('agencies.update',$agency->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputCode">Mã số đại lý
                            <input type="text" class="form-control" name="code" id="inputCode"
                                   value="{{$agency->name}}" required>
                        </label>
                        <div class="error-message">
                            @error('code')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Tên đại lý
                            <input type="text" class="form-control" name="name" id="inputName"
                                   value="{{$agency->name}}" required>
                        </label>
                        <div class="error-message">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Điện thoại
                            <textarea name="phone" id="inputPhone"
                                      class="form-control">{{$product->phone}}</textarea>
                        </label>
                        <div class="error-message">
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                   value="{{$agency->email}}">
                        </label>
                        <div class="error-message">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select class="form-control" name="category_id">
                            @foreach($statuses as $status)
                                @if($agency->status_id == $status->id)
                                    <option value="{{$status->id}}" selected>{{$status->name}}</option>
                                @else
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"> Cập nhật</button>
                    <a href="{{route('agencies.list')}}">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
@endsection
