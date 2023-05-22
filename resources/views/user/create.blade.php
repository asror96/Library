@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="form-group ">
                <label for="name" class="mb-2 d-flex"> Author name</label>
                <input type="text" name="name" class="form-control mb-3" id="name" placeholder="Author name"  value="{{old('name')}}"/>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group ">
                <label for="email" class="mb-2 d-flex"> Author email</label>
                <input type="email" name="email" class="form-control mb-3" id="email" placeholder="Author email" value="{{old('name')}}"/>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group ">
                <label for="pwd" class="mb-2 d-flex"> Author password</label>
                <input type="text" name="password" class="form-control mb-3" id="pwd" placeholder="Author password" value="{{old('name')}}"/>
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-success text">Create author</button>
            </div>

        </form>
    </div>

@endsection
