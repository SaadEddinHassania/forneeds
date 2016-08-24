<?php

namespace App\Http\Controllers\Auth;

use App\Models\Citizen;
use App\Models\Sector;
use App\Models\ServiceProvider;
use App\Models\ServiceProviderType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompleteRegistrationController extends Controller
{


    /**
     * CompleteRegistrationController constructor.
     */

    protected function getCompleteRegistration()
    {
        $types = ServiceProviderType::pluck('name', 'id');
        $sectors = Sector::pluck('name', 'id');
        return view('auth.completeRegistration', compact('types', 'sectors'));
    }

    protected function postCompleteServiceProviderRegistration(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'mission_statement' => 'required',
            'service_provider_type_id' => 'required|exists:service_provider_types,id',
            'sector_id' => 'required|exists:sectors,id'
        ]);

    //   dd(array_add($request->all(), 'user_id', $user->id));
        $serviceProvider = ServiceProvider::create($request->all());

        $serviceProvider->user_id = $user->id;

        $serviceProvider->save();

        Session::flash('flash_message', 'Registration Completed');

        return redirect('profile');
    }

    protected function postCompleteCitizenRegistration(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [

        ]);

       //dd(array_add($request->all(), 'user_id', $user->id));
        $citizen = Citizen::create($request->all());

        $citizen->user_id = $user->id;

        $citizen->save();

        Session::flash('flash_message', 'Registration Completed');

        return redirect('profile');
    }
}
