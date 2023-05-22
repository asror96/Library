@extends('layouts.index')
@section('content')
    <div>
        <form action="{{route('genre.store')}}" method="post">
            @csrf
            <div class="form-group ">
                <label for="name" class="mb-2 d-flex justify-content-center"> Genre name</label>
                <input type="text" name="name" class="form-control mb-3" id="name" placeholder="Genre name" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success text">Create genre</button>
            </div>

        </form>
    </div>

@endsection
