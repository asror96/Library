@extends('layouts.index')
@section('content')
    <div>
        <a href="{{route('genre.create')}}" class="btn btn-primary mb-3">Add new genre</a>
        @foreach($genres as $genre)
            <div class="mb-2">
                <a style="text-decoration: none; color: black;" href={{route('genre.show',$genre->id)}}> {{$genre->id}}. {{$genre->name}}</a>
            </div>
        @endforeach
    </div>

@endsection
