<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{

    //testing de dos vistas
    public function test_view_index()
    {  
        //testing index page
        $this->get(route('login'))
                ->assertStatus(200);
       
    }
 
     public function test_videos(){
      //testing index page of json search
      $this->get(route('jsonSearch'))
              ->assertStatus(200);
     }
  
}
