@extends('layouts.index')
@section('content')
    <div>
        <div class="container-fluid" >
            <form class="d-flex" action="{{route('book.search')}}" method="post">
                @csrf
                <input name="search_book" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{old('search_book')}}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div><br>


        <a href="{{route('book.create')}}" class="btn btn-primary mb-3">Add new book</a>
        @foreach($books as $book)
            <div class="mb-2">
                <a style="text-decoration: none; color: black;" href={{route('book.show',$book->id)}}> {{$book->id}}. {{$book->name}}  {{$book->type}} {{$book->user_name}} @foreach($book->genres as $genre) {{$genre}}@endforeach {{$book->created_at->format('d.m.Y')}}</a>
            </div>
        @endforeach
    </div>

@endsection
