@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('json') }}">
            @csrf
            <div class="form-group">
                <label for="Jkeyword">Enter a keyword to display the results in JSON format</label>
                <input type="text" name="Jkeyword" class="form-control" id="inputKeyword" aria-describedby="emailHelp"
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
            <div class="form-group">
                <label for="JResults">Number of results:</label>
                <select name="JResults" id="results" class="form-control">
                    <option value="#" disabled>Select the amount of results you want to get...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">JSON Search!</button>
        </form>
    </div>

@endsection
