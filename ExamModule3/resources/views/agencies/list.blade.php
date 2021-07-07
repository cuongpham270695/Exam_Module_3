@extends('layouts.master')
@section('title','Danh sách đại lý phân phối')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2>Danh sách đại lý phân phối</h2>
            </div>
            <div class="col-12">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check"
                           aria-hidden="true"></i>{{\Illuminate\Support\Facades\Session::get('success')}}
                    </p>
                @endif
            </div>
            <div class="col-12">
                <a href="{{route('agencies.create')}}" class="btn btn-success col-2">Thêm mới</a>
                <div class="col-8">
                    <form class="navbar-form navbar-left" action="{{route('agencies.search')}}" method="get">
                        @csrf
                        <div class="form-group ">
                            <input type="text" class="form-control" placeholder="Search" name="keyword">
                        </div>
                        <button type="submit" class="btn btn-default">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ Session::get('success') }}
                    </p>
                @endif

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Mã số đại lý</th>
                        <th scope="col">Tên đại lý</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tên người quản lý>
                        <th scope="col">Trạng thái</th>
                        <th colspan="2" style="text-align: center">Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($agencies as $key => $agency)
                        <tr>
                            <t>d{{$agency->code}}</t>
                            <td>{{$agency->name}}</td>
                            <td>{{$agency->phone}}</td>
                            <td>{{$agency->address}}</td>d
                            <td>{{$agency->manager}}</td>
                            <td>
                                @if($agency->status)
                                    {{$agency->status->name}}
                                @else
                                    Không có đại lý nào
                                @endif
                            </td>
                            <td>

                            </td>
                            <td><a href="{{route('agencies.edit',$agency->id)}}" class="btn btn-primary">Sửa</a>
                            </td>
                            <td><a href="{{route('agencies.destroy',$agency->id)}}" class="btn btn-danger"
                                   onclick="return confirm('Bạn có muốn xóa đại lý này không ?')">Xóa</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; background-color: red; color: #ffffff">Không có đại lý nào
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
@endsection
