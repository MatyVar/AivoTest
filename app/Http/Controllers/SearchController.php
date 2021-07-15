<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Custom\Youtube;



class SearchController extends Controller
{

    public function videos(Request $request){
        
        $request->validate([
            'search'=>'required',
        ]);
        $response =  $this->getVideos($request);
        if(gettype($response)!='integer'){
            $response = json_decode($response,true);
        }      
     return  view('auth.results')->with('resultsYoutube',$response);

    }

    public function getVideosApi(Request $request){
        $request->validate([
            'search'=> 'required',
        ]);
        $response = $this->getVideos($request);
        if(gettype($response)!='integer'){
            $response = json_decode($response,true);
            return $response;
        }    
        return view('auth.jsonException')->with('httpCode',$response);
    
    }

    public function getVideos(Request $request){

        //captura la keyword y la envia a la funcion que retorna resultados junto a la cantidad de resultados esperados.
        $youtubeRequest = new Youtube();
        $keyword=$_GET['search'];
        $cantresult = 10;
        $response = $youtubeRequest->getVideos($keyword,$cantresult);

        return $response;
        }


 public function jsonSearch(){
    return view('auth.jsonSearch');
}
  
}
