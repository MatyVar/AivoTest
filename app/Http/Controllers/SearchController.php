<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function videos(Request $request){

        $response =  $this->getVideos($request);
        if(gettype($response)!='int'){
            $response = json_decode($response,true);
        }      
     return  view('auth.results')->with('resultsYoutube',$response);

    }

    public function getVideosApi(Request $request){

        $response =  $this->getVideos($request);
        if(gettype($response)!='integer'){
            $response = json_decode($response,true);
            return $response;
        }    
        return view('auth.jsonException')->with('httpCode',$response);
    
    }
   
    public function getVideos(Request $request){
        
        $keyword=$_GET['search'];
        $connectApi=$this->urlGen($keyword,10);
        $array = array();
        //se prepara el GET a la api de youtube mediante curl.
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$connectApi);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //se ejecuta el GET a la api de youtube.
        $result = curl_exec($ch);
        

        //Guardo estado http de la response, tras consulta a la api de youtube.
        $httpStatuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //si la respuesta es satisfactoria, procedemos a decodificar el JSON y recorrerlo para extraer los valores requeridos. 
        if($httpStatuscode ==200){
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
        if(!empty($array)){
            return json_encode($array);
        }else{
            return $httpStatuscode;
        }
        }

    public function urlGen($keyword,$cantresult){
        /*
        generación de url, esta funcion concatena parametros para retornar 
        la url con la cual se realizará el GET a la API de youtube.
        */ 
        $peticion = $keyword;    
        $peticion= str_replace(' ','+',$peticion);
        $api_key = 'AIzaSyDZn78cA3T_gf10-HfixEuo87lJ7tgeguc';  //API KEY, Reemplazar por api key de youtube data API v3
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
 public function jsonSearch(){
    return view('auth.jsonSearch');
}
  
}
