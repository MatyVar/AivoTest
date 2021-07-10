@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="GET" action="{{ route('getVideosApi') }}">
            <div class="form-group">
                <label for="search">Enter a keyword to display the results in JSON format</label>
                <input type="text" name="search" class="form-control" id="inputKeyword" aria-describedby="emailHelp"
                    placeholder="Search on YouTube...">
                <small id="emailHelp" class="form-text text-muted">* The application will connect with YouTube Services.</small>
                @error('Jkeyword')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6 alert alert-danger"
                        role="alert">
                        <strong class="r">Error!</strong>
                        <span class="block"> {{ $message }}</span>
                    </div>
                @enderror
            </div>
         
            <button type="submit" class="btn btn-success">JSON Search!</button>
        </form>
    </div>

@endsection
