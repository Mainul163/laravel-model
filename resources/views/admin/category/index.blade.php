@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>

                <div class="card-body">
                    <a href="{{route('category.create')}}" class="btn btn-success"> Add Category</a>
                    <br>
                    <br>
                    <br>
                    <table class='table table-responsive'>
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->category_name}}</td>
                                <td>{{$row->category_slug}}</td>
                                <td>
                                    <div class='d-flex align-items-center gap-3 fs-6'>
                                        <a href="{{route('category.edit',$row->id)}}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{route('category.destroy',$row->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="text-danger rmv_btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i
                                                    class="fa-regular fa-trash-can">Delete</i></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection