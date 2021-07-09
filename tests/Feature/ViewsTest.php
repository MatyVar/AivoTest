<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewsTest extends TestCase
{   
   public function test_view_index()
   {  
       //testing index page
       $this->get(route('login'))
               ->assertStatus(200);
      
   }
   public function test_view_results()
   {
        //testing del post de la busqueda normal
        $response = $this->call('POST', '/search', ['keyword' => 'muse','results' => '10']);
        $response->assertStatus(200);
   }

   public function test_view_jsonSearch(){
         //testing json mode 
         $this->get(route('jsonSearch'))
         ->assertStatus(200);
   }

   public function test_view_jsonresults()
   {
        //testing del post de la busqueda para json
        $response = $this->call('POST', '/json', ['Jkeyword' => 'muse','JResults' => '10']);
        $response->assertStatus(200);
   }
}


