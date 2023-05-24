@extends('layouts.index')
@section('content')
    <div>
        <h1 style="margin-left: 350px">Genres</h1>
        <a href="{{route('genre.create')}}" class="btn btn-primary mb-3">Add new genre</a>
        <table style="width: 60%;" class="text-center">
            <thead>
                <tr>
                    <td style="border: 1px solid;">Genre ID</td>
                    <td style="border: 1px solid;">Genre name</td>
                    <td style="border: 1px solid;">Edit</td>
                </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td style="border: 1px solid;">{{$genre->id}}</td>
                    <td style="border: 1px solid;">{{$genre->name}}</td>
                    <td style="border: 1px solid;"><a class="btn btn-success" href={{route('genre.show',$genre->id)}}> Edit </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
