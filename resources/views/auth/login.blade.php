@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="GET" action="{{ route('vervideos') }}">
                        <div class="form-group">
                <label for="exampleInputEmail1">Enter a keyword to start searching for videos !</label>
                <input type="text" name="search" class="form-control" id="inputKeyword" aria-describedby="emailHelp"
                    placeholder="Search on YouTube...">
                <small id="emailHelp" class="form-text text-muted">* The application will connect with YouTube Services.</small>
                @error('search')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6 alert alert-danger"
                        role="alert">
                        <strong class="r">Error!</strong>
                        <span class="block"> {{ $message }}</span>
                    </div>
                @enderror
            </div>
            <!--
            <div class="form-group">
                <label for="results">Number of results:</label>
                <select name="results" id="results" class="form-control">
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
        -->
            <button id="btnSubmit" type="submit" style="background-color: #832CFA" class="btn  text-white">Normal
                Search!</button>

        </form>

    </div>


@endsection
