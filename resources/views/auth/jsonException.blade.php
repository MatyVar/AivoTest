@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @if ($httpCode >= 200 && $httpCode < 300)
                <h3>No results...Please try with another KeyWord</h3>
                <img style="opacity: 0.2"
                    src="{{ asset('/img/1456208769_258_Geniuses-we-love-Vic-Bell-Illustrator-and-icon-designer.png') }}"
                    alt="">
            @elseif($httpCode>=400 && $httpCode < 500) 
                    <div class="alert alert-danger">
                    <h3>Error code {{ $httpCode }}, YouTube Data API quota exceeded or bad request..</h3>
                    </div>
                    <img style="opacity: 0.2" src="{{ asset('/img/1456208769_258_Geniuses-we-love-Vic-Bell-Illustrator-and-icon-designer.png') }}" alt="">
                
             @else
                      <div class="alert alert-danger">
                      <h3>Can't connect with YouTube services, please check your connection.</h3>
                     </div>
                     <img style="opacity: 0.2" src="{{ asset('/img/1456208769_258_Geniuses-we-love-Vic-Bell-Illustrator-and-icon-designer.png') }}" alt="">
             @endif

           
         </div>
         <div>
            <a id="btnSubmit" type="submit" style="background-color: #832CFA" class="btn text-white"
                href="{{ route('jsonSearch') }}">Back!</a>
            </div>
    </div>


@endsection