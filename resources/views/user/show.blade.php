@extends('layouts.index')
@section('content')
    <div class="mb-3">
        <div>{{$user->id}}. {{$user->name}} {{$user->email}} Count of book:  {{$user->count_of_book}}</div>
    </div>
    <div class="mb-3">
        <a class="btn" style="text-decoration: none; color: white;background: #45A29E;" href="{{route('user.edit',$user->id)}}">Edit</a>
    </div>
    <div class="mb-3">
        <form action="{{route('user.delete',$user->id)}}" method="post">
            @csrf
            @method('delete')
            <input class="btn" style="text-decoration: none; color: white;background: #235754;" type="submit" value="Delete">
        </form>
    </div>
    <div >
        <a class="btn bg-dark" style="text-decoration: none; color: white" href="{{route('user.index')}}">Back</a>
    </div>
@endsection
