@extends('layouts.index')
@section('content')
    <div class="mb-3">
        <div> {{$book->id}}. {{$book->name}}  {{$book->type}} {{$book->user_name}} @foreach($book->genres as $genre)
                {{$genre}}
            @endforeach {{$book->created_at->format('d.m.Y')}}</div>
    </div>
    <div class="mb-3">
        <a class="btn" style="text-decoration: none; color: white;background: #45A29E;" href="{{route('book.edit',$book->id)}}">Edit</a>
    </div>
    <div class="mb-3">
        <form action="{{route('book.delete',$book->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn" style="text-decoration: none; color: white;background: #235754;" type="submit" value="Delete">
        </form>

    </div>
    <div >
        <a class="btn bg-dark" style="text-decoration: none; color: white" href="{{route('book.index')}}">Back</a>
    </div>
@endsection
