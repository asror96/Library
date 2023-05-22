@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('book.update',$book->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group ">
                <label for="name" class="mb-2"> Book name</label>
                <input type="text" name="name" class="form-control mb-3 " id="name" placeholder="Genre name" value="{{$book->name}}" />
            </div>
            <label class="mb-1" for="type">  Type of book </label>
            <select class="form-select mb-1" aria-label="Default select example" id="type" name="type">
                @foreach($types as $type)
                    <option value="{{$type->value}}"  {{$type->value===$book->type?'selected':''}}> {{$type->name}} </option>
                @endforeach
            </select>

            <label class="mb-1" for="user"> Author name </label>
            <select class="form-select" aria-label="Default select example" id="user" name="user_id">
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{$user->id===$book->user_id?'selected':''}}> {{$user->name}} </option>
                @endforeach
            </select>

            <label class="mb-1" for="genre">  Genre of book </label>
            <select multiple class="form-select mb-3" aria-label="Default select example" id="genre" name="genre_id[]" >
                @foreach($genres as $genre)
                    <option
                        @foreach($genre_array as $id)
                            {{$genre->id===$id ?'selected':''}}
                        @endforeach
                        value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>

            <div class="text-center">
                <button type="submit" class="btn btn-success text">Book update</button>
            </div>

        </form>
    </div>

@endsection
