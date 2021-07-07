@extends('layouts.master')
@section('title', 'Status list')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh sach trang thai</h1>
            </div>
            <a class="btn btn-primary" href="{{route('status.create')}}">Thêm mới</a>
            <div class="col-12">
                @if (\Illuminate\Support\Facades\Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ \Illuminate\Support\Facades\Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Trang thai</th>
                    <th scope="col">Number of product</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($statuses as $key => $status)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $status->name }}</td>
                        <td>{{ count($status->agency) }}</td>
                        <td><a href="{{route('status.edit', $category->id)}}">Edit</a></td>
                        <td><a href="{{route('status.destroy', $category->id)}}" class="text-danger"
                               onclick="return confirm('Are you sure to delete this status?')">Delete</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="background-color: red; color: white; text-align: center">Don't have status</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
