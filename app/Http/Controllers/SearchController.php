<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
   
    public function urlGen($keyword,$cantresult){
        /*
        generación de url, esta funcion concatena parametros para retornar 
        la url con la cual se realizará el GET a la API de youtube.
        */ 
        $peticion = $keyword;    
        $peticion= str_replace(' ','+',$peticion);
        $api_key = 'AIzaSyDGnK7iORNfhajzokBPYnim6MUGG4UGyMw';  //API KEY, Reemplazar por api key de youtube data API v3
        $url_youtube = 'https://www.googleapis.com/youtube/v3/search';
        $busqueda = $peticion;
        $region = 'AR';
        $type = 'video';
        $part = 'snippet';
        $results = $cantresult;
        $url = $url_youtube;
        $url .='?key='.$api_key;
        $url.= '&part'.$part;
        $url.='&part='.$part;
        $url.='&maxResults='.$results;
        $url.='&order=relevance';
        $url.='&q='.$busqueda;
        $url.='&type='.$type;
        return $url;
 }

    public function search(Request $request){
        //validacion de datos recuperadis de la request
        $data = $request->validate([
            'keyword'=> 'required',
            'results'=> 'required | max:10',
        ]);
        //se genera la url para el GET a la API de youtube
        $url = $this->urlGen($data['keyword'],$data['results']);
        //se inicializa un array vacio que contendrá los videos.
        $array = array();
        //se prepara el GET a la api de youtube mediante curl.
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //se ejecuta el GET a la api de youtube.
        $result = curl_exec($ch);

        //Guardo estado http de la response, tras consulta a la api de youtube.
        $httpStatuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //si la respuesta es satisfactoria, procedemos a decodificar el JSON y recorrerlo para extraer los valores requeridos. 
        if($httpStatuscode == 200){
            $phpObj = json_decode($result,true);
            
            foreach($phpObj['items'] as $key =>$value ){
                $prueba = array(
                'published_at'=>$value['snippet']['publishedAt'],
                'id'=>$value['id']['videoId'],
                'title'=>$value['snippet']['title'],
                'description'=>$value['snippet']['description'],
                'thumbnail'=>$value['snippet']['thumbnails']['default']['url'],         
                'extra'=>array(
                'channelTitle'=>$value['snippet']['channelTitle'],
                'liveBroadcastContent' => $value['snippet']['liveBroadcastContent'],
             ),
          
           );
            //agrego array en cada iteracion.
          array_push($array,$prueba);
        }
        }
   return view('auth.results')
            ->with('resultsYoutube',$array)
            ->with('httpStatuscode',$httpStatuscode);      
}

    public function jsonSearch(){
        return view('auth.jsonSearch');
    }

     public function json(Request $request){
      //validacion de datos recuperadis de la request
        $data = $request->validate([
            'Jkeyword'=> 'required',
            'JResults'=> 'required | max:10',
        ]);
           //se genera la url para el GET a la API de youtube
        $url = $this->urlGen($data['Jkeyword'],$data['JResults']);
        //se inicializa un array vacio que contendrá los videos.
        $array = array();
        //se prepara el GET a la api de youtube mediante curl.
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //se ejecuta el GET a la api de youtube.
        $result = curl_exec($ch);

        //Guardo estado http de la response, tras consulta a la api de youtube.
        $httpStatuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //si la respuesta es satisfactoria, procedemos a decodificar el JSON y recorrerlo para extraer los valores requeridos. 
        if($httpStatuscode == 200){
            $phpObj = json_decode($result,true);
            
            foreach($phpObj['items'] as $key =>$value ){
    
            $prueba = array(
                'published_at'=>$value['snippet']['publishedAt'],
                'id'=>$value['id']['videoId'],
                'title'=>$value['snippet']['title'],
                'description'=>$value['snippet']['description'],
                'thumbnail'=>$value['snippet']['thumbnails']['default']['url'],         
                'extra'=>array(
                'channelTitle'=>$value['snippet']['channelTitle'],
                'liveBroadcastContent' => $value['snippet']['liveBroadcastContent'],
                 ),
            );
            
            array_push($array,$prueba);        
        }
    }
    //si el array contiene elementos se codifica en JSON y se retorna
    if (!empty($array)){
        return json_encode($array); 
    }else{
        //si está vacío, la consulta no trajo nada, entonces se muestra una vista de errores.
        return view('auth.jsonException')->with('httpStatuscode',$httpStatuscode); 
    }
  }
  
}
