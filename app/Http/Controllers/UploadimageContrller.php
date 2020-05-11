<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadimageContrller extends Controller
{
   public function upload(Request $request){


       if ($request->hasFile('image')){
            $imageName=rand(2,10). "-" .$request->image->getClientOriginalName();
            $path= $request->image->storeAs('public/',$imageName);
              return $path;
       }
           return 'false';

   }
}
