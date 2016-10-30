<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{
    /**
    * Create view file
    *
    * @return void
    */
    public function getImage()
    {
        $data=array(
            'detenidos'=>\DB::table('persona')
            ->join('reporte_barandilla', 'persona.id_persona', '=', 'reporte_barandilla.id_persona')
            ->select('persona.*')
            ->get()
            );
        dd($data);
        return view('upload-image');
    }
    /**
    * Manage Post Request
    *
    * @return void
    */
    public function postImage(Request $request)
    {   
        dd($request->all());
        $this->validate($request, [
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images'), $imageName);
        return back()
            ->with('success','You have successfully upload images.')
            ->with('image',$imageName);
    }
}