@extends('layouts.index')
@section('content')
    <div>
        <a href="{{route('book.create')}}" class="btn btn-primary mb-3">Add new book</a>
        @foreach($books as $book)
            <div class="mb-2">
                <a style="text-decoration: none; color: black;" href={{route('book.show',$book->id)}}> {{$book->id}}. {{$book->name}}  {{$book->type}} {{$book->user_name}} @foreach($book->genres as $genre){{$genre}}@endforeach {{$book->created_at->format('d.m.Y')}}</a>
            </div>
        @endforeach
    </div>

@endsection
