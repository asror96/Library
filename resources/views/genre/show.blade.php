@extends('layouts.index')
@section('content')
    <div class="mb-3">
        <div>{{$genre->id }}.{{$genre->name}}</div>
    </div>
    <div class="mb-3">
        <a class="btn" style="text-decoration: none; color: white;background: #45A29E;" href="{{route('genre.edit',$genre->id)}}">Edit</a>
    </div>
    <div class="mb-3">
        <form action="{{route('genre.delete',$genre->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn" style="text-decoration: none; color: white;background: #235754;" type="submit" value="Delete">
        </form>

    </div>
    <div >
        <a class="btn bg-dark" style="text-decoration: none; color: white" href="{{route('genre.index')}}">Back</a>
    </div>
@endsection
