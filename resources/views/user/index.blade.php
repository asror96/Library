@extends('layouts.index')
@section('content')
    <div>
        <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Add new author</a>
        @foreach($users as $user)
            <div class="mb-2">
                <a style="text-decoration: none; color: black;" href={{route('user.show',$user->id)}}> {{$user->id}}. {{$user->name}} {{$user->email}} Count of book:  {{$user->count_of_book}}</a>
            </div>
        @endforeach
    </div>

@endsection
