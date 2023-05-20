@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('book.store')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="mb-2 d-flex justify-content-center"> Book name</label>
                <input type="text" name="name" class="form-control mb-2" id="name" placeholder="Book name"/>

                <label class="mb-1" for="type">  Type of book </label>
                <select class="form-select" aria-label="Default select example" id="type" name="type">
                    @foreach($types as $type)
                        <option value="{{$type->value}}"> {{$type->name}} </option>
                    @endforeach
                </select>

                <label class="mb-1 mt-1" for="user"> Author name </label>
                <select class="form-select" aria-label="Default select example" id="user" name="user_id">
                    @foreach($users  as $user){
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    } @endforeach
                </select>
                <label class="mb-1" for="genre">  Genre of book </label>
                <select multiple class="form-select" aria-label="Default select example" id="genre" name="genre_id[]" >
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success text">Create genre</button>
            </div>

        </form>
    </div>

@endsection
