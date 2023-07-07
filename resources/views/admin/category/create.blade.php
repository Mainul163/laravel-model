@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>

                <div class="card-body">
                    <a href="{{route('category.index')}}" class="btn btn-success"> All Category</a>
                    <br>
                    <br>
                    <br>
                    <form action="{{route('category.store')}}" method='post'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category name</label>
                            <input type="text" class="form-control" name="category_name" id="inputEmail3"
                                class="@error('category_name') is-invalid @enderror" value="{{old('category_name')}}">

                            @error('category_name')
                            <strong class=" text-danger">{{ $message }}</strong>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection