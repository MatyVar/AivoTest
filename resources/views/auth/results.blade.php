@extends('layouts.app')


@section('content')
    @if (gettype($resultsYoutube) != 'integer')

        <div class="container ">
            <div class="row">
                @for ($i = 0; $i < count($resultsYoutube); $i++)
                    <div class="col ">
                        <div class="card mb-3" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $resultsYoutube[$i]['thumbnail'] }}" alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title">{{ $resultsYoutube[$i]['title'] }}</h5>
                                <span class="font-weight-bold">Id del video:</span> {{ $resultsYoutube[$i]['id'] }} <br>
                                <span class="font-weight-bold">Nombre del canal:</span>
                                {{ $resultsYoutube[$i]['extra']['channelTitle'] }} <br>
                                <span class="font-weight-bold">Publicado el: </span>
                                {{ $resultsYoutube[$i]['published_at'] }}<br>
                                <p class="card-text"> {{ $resultsYoutube[$i]['description'] }}</p>
                                <a href="https://www.youtube.com/watch?v={{ $resultsYoutube[$i]['id'] }}"
                                    class="btn btn-primary">Go
                                    Video!</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div>
                <a id="btnSubmit" type="submit" style="background-color: #832CFA" class="btn text-white"
                    href="{{ route('home') }}">Back!</a>
                </div>
        </div>
    @else

   <div class="container">
           
                <!--Si el array $resultsYoutube no tiene contenido, significa que la consulta a la api no trajo videos, si el status fue satisfactorio, se recomienda probar con otra palabra clave.-->
                @if ($resultsYoutube >= 200 && $resultsYoutube < 300)
                    <h3>mmm... nothing here, video not found. Please retry with another keyword ;)</h3>
                    <img style="opacity: 0.2" src="{{ asset('/img/1456208769_258_Geniuses-we-love-Vic-Bell-Illustrator-and-icon-designer.png') }}" alt="">
                    <!-- Si el array no contiene videos, y el estado http es en este rango, se muestra un mensaje de error-->
                @elseif($resultsYoutube >= 400 && $resultsYoutube< 500) 
                       <div class="alert alert-danger">
                        <h3>Error code {{ $resultsYoutube }}, YouTube Data API quota exceeded or forbidden request..</h3>
                       </div>
                          <img style="opacity: 0.2"
                          src="{{ asset('/img/1456208769_258_Geniuses-we-love-Vic-Bell-Illustrator-and-icon-designer.png') }}"
                                 alt="">
                  @else
                             <div class="alert alert-danger">
                              <h3>Can't connect with youtube services, please check your connection.</h3>
                              </div>
                              <img style="opacity: 0.2"
                              src="{{ asset('/img/1456208769_258_Geniuses-we-love-Vic-Bell-Illustrator-and-icon-designer.png') }}"
                              alt="">
                  @endif
   
                  <div>
                    <a id="btnSubmit" type="submit" style="background-color: #832CFA" class="btn text-white"
                        href="{{ route('home') }}">Back!</a>
                    </div>
                </div>

                     @endif
  
@endsection
