<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use Illuminate\Http\Request;

class UploadimageContrller extends Controller
{
   public function upload(Request $request){

return "hi";
       //       if ($request->hasFile('image')){
//            $imageName=rand(2,10). "-" .$request->image->getClientOriginalName();
//            $path= $request->image->storeAs('public/',$imageName);
//              return $path;
//       }


       $image=new ImageUpload();
       $image->image=$request->image;
       if ($image->save()){
           return  "true";
       }
           return 'false';

   }
   public function getImage(){
       $image=ImageUpload::all();
       return $image;
   }
}
