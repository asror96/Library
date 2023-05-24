@extends('layouts.index')
@section('content')
    <div>
        <h1 style="margin-left: 350px">Users</h1>
        <div>
            <a href="{{route('user.create')}}" class=" btn btn-primary mb-3">Add new author</a>
        </div>

        <table style="width: 80%;" class="text-center">
            <thead>
                <tr class="text-center">
                    <td style="border: 1px solid;">User ID</td>
                    <td style="border: 1px solid;"> User name</td>
                    <td style="border: 1px solid;">User email</td>
                    <td style="border: 1px solid;">Count of book</td>
                    <td style="border: 1px solid;">Edit</td>
                </tr>
            </thead>
        @foreach($users as $user)
                <tbody>
                    <tr>
                        <td style="border: 1px solid;">{{$user->id}}</td>
                        <td style="border: 1px solid;">{{$user->name}}</td>
                        <td style="border: 1px solid;">{{$user->email}}</td>
                        <td style="border: 1px solid;">{{$user->count_of_book}}</td>
                        <td style="border: 1px solid;"><a class="btn btn-success" href={{route('user.show',$user->id)}}>Edit</a></td>
                    </tr>
                </tbody>
        @endforeach
        </table>
    </div>

@endsection
