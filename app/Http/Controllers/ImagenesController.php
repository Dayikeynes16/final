<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller
{
    //
    function showImage(Images $image){
        return Storage::response($image->path);

    }
    function guardarImagen(Request $request){
        $request->validate([
            'producto_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
            
        ]);
        $imagen = Images::create([
            'producto_id'=>$request->input('producto_id'),
            'path' => $request->file('image')->store('images')
        ]);
        return response()->json(['data'=>$imagen]);
    }

    function getImagenes(Request $request){
        $request->validate([
            'id'=>'required'
        ]);
        $id = $request->input('id');
        $imagenes = Images::where('producto_id', $id)->get();
        if($imagenes){
            return response()->json($imagenes);
           
        } else{
            return response()->json(['data'=>'no se ha encontrado']);
        }
        
    }
    function eliminarImagen(Request $request){
        $imagen = Images::find($request->input('id'));

        if($imagen){
            $imagen->delete();
            Storage::delete($imagen->path);
            return response()->json(['data'=>'eliminado con exito']);
        }else{
            return response()->json(['error'=>'imagen no encontrada']);
        }


    }
}
