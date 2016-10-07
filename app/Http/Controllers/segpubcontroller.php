<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class segpubcontroller extends Controller
{
     public function index(){
        //dd("policon");
        return view('visPoli.indexPoli');
    }
    
    public function logout(){
        session()->forget('Policia');
        return redirect('/');
    }
    public function nueva_barandilla(){
        $datalocal=array(
            'localidades'=> \App\localidad::get(),
        );
    	return view('visPoli.newBarandilla',$datalocal);
    }
    public function postImage(Request $request)
    {
        $this->validate($request, [
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images'), $imageName);
        return back()
            ->with('success','Foto subida correctamente.')
            ->with('image',$imageName);
    }
     public function getImage()
    {
        nueva_barandilla();
    }
}
