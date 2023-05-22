@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('user.update',$user->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group ">
                <label for="name" class="mb-2"> User name</label>
                <input type="text" name="name" class="form-control mb-3 " id="name" placeholder="User name" value="{{$user->name}}" />
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group ">
                <label for="email" class="mb-2"> User email</label>
                <input type="text" name="email" class="form-control mb-3 " id="email" placeholder="User name" value="{{$user->email}}" />
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-success text">Book update</button>
            </div>

        </form>
    </div>

@endsection
