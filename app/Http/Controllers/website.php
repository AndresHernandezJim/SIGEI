<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class website extends Controller
{
    public function nusu(){
    	 $data=array(
            'privilegios'=> \App\privilegios::get(),
        );
        return view('/website/nusu',$data);
    }
}
