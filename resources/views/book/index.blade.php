@extends('layouts.index')
@section('content')
    <div>
        <h1 style="margin-left: 350px">Books</h1>
        <div class="input-group" >
            <form class="d-flex" action="{{route('book.search')}}" method="post">
                @csrf
                <input style="width: 600px;" name="search_book" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{old('search_book')}}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div><br>
        <div style="margin-left: 25px">
            <form style="display: flex;"  action="{{route('book.index')}}" method="get">
                <div>
                    <select style="width:200px;" class="form-select block" aria-label="Default select example" name="genre_id">
                        <option selected value="">Select genre</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary text">Filter</button>
                </div>
            </form>
        </div>
        <div style="margin-left: 25px">
            <form style="display: flex;"  action="{{route('book.index')}}" method="get">
                <div >
                    <select style="width:200px; " class="form-select block" aria-label="Default select example" name="user_id">
                        <option selected value="">Select author</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary text">Filter</button>
                </div>
            </form>
        </div>
        <br>
        <a href="{{route('book.create')}}" class="btn btn-primary mb-3">Add new book</a>
        <table class="text-center" style="width: 1000px;border: 1px solid;">
            <thead>
                <tr >
                    <td style="border: 1px solid;">Book ID</td>
                    <td style="border: 1px solid;">Book name</td>
                    <td style="border: 1px solid;">Book type</td>
                    <td style="border: 1px solid;">Author name</td>
                    <td style="border: 1px solid;">Genres</td>
                    <td style="border: 1px solid;">Creat data</td>
                    <td style="border: 1px solid;">Edit</td>
                </tr>
            </thead>
            <tbody>
            @foreach($books as $book)

                <tr>
                    <td style="border: 1px solid;">{{$book->id}}</td>
                    <td style="border: 1px solid;">{{$book->name}}</td>
                    <td style="border: 1px solid;">{{$book->type}}</td>
                    <td style="border: 1px solid;">{{$book->user_name}}</td>
                    <td style="border: 1px solid;">@foreach($book->genres as $genre) {{$genre}}@endforeach</td>
                    <td style="border: 1px solid;">{{$book->created_at->format('d.m.Y')}}</td>
                    <td style="border: 1px solid;"><a class="btn btn-success" href={{route('book.show',$book->id)}}>Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

@endsection
