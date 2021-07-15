<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class youtubeApiTest extends TestCase
{

   /**@test */
   public function test_youtube_api_conection(){
      $this->withoutExceptionHandling();
   
      //example keywortd
      $peticion = 'muse';    
      $peticion= str_replace(' ','+',$peticion);
      $api_key = env('YOUTUBE_API_KEY');  //API KEY, Reemplazar por api key de youtube data API v3
      $url_youtube = 'https://www.googleapis.com/youtube/v3/search';
      $busqueda = $peticion;
      $type = 'video';
      $part = 'snippet';
      //example results
      $results = 10;
      $url = $url_youtube;
      $url .='?key='.$api_key;
      $url.= '&part'.$part;
      $url.='&part='.$part;
      $url.='&maxResults='.$results;
      $url.='&order=relevance';
      $url.='&q='.$busqueda;
      $url.='&type='.$type;

      $ch=curl_init();
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_HEADER,false);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

      curl_exec($ch);
      $status = curl_getinfo($ch,CURLINFO_HTTP_CODE);

      $response = $this->assertEquals(200,$status );
      //importante cerrar recurso curl
      curl_close($ch);

       
}
      

   
  
}
