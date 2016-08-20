<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilePageController extends Controller
{
    public function getIndex(Request $request)
    {
        $user = Auth::user();

        if($user->isServiceProvider()) {
            return view('profiles.serviceProviders.index',compact('user'));
        }else if($user->isUser()){
            return view('profiles.users.index',compact('user'));
        }
    }

    public function getImage(Request $request){
        $user = Auth::user();
        $img = Image::make(storage_path('assets\images\\' . $user->avatar))->resize(150, 150);

        return $img->response('jpg');
//        return Image::make(storage_path('assets\images\\' . $user->avatar));
    }
}
