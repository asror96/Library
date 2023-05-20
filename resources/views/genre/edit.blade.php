@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('genre.update',$genre->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group ">
                <label for="name" class="mb-2"> Genre name</label>
                <input type="text" name="name" class="form-control mb-3" id="name" placeholder="Genre name" value="{{$genre->name}}" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success text">Update genre</button>
            </div>

        </form>
    </div>

@endsection
