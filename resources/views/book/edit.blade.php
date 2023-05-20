@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('book.update',$book->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group ">
                <label for="name" class="mb-2"> Book name</label>
                <input type="text" name="name" class="form-control mb-3" id="name" placeholder="Genre name" value="{{$book->name}}" />
            </div>

            <label class="mb-1" for="type">  Type of book </label>
            <select class="form-select" aria-label="Default select example" id="type" name="type">
                @foreach($types as $type)
                    <option value="{{$type->value}}"> {{$type->name}} </option>
                @endforeach
            </select>

            <div class="text-center">
                <button type="submit" class="btn btn-success text">Book genre</button>
            </div>

        </form>
    </div>

@endsection
