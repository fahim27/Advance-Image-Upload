<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use Illuminate\Http\Request;

class UploadimageContrller extends Controller
{
   public function upload(Request $request){

//return $request->all();
              if ($request->hasFile('image')){
              $imageName=rand(2,10). "-" .$request->image->getClientOriginalName();
              $path=$request->file('image')->store('images/pic/','public');
              $image=new ImageUpload();
              $image->image=$path;
              if ($image->save()){
                  return "true";
              }

       }

//
//       $image=new ImageUpload();
//       $image->image=$request->image;
//       if ($image->save()){
//           return  "true";
//       }
//           return 'false';

   }
   public function getImage(){
       $image=ImageUpload::first();
      return response()->json([
         $image
      ]);
   }

   public function welcome(){
      $image=ImageUpload::first();
      return view('welcome',\compact('image'));
   }
}
