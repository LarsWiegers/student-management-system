<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registrationNotComplete()
    {
        return view('auth.registration-not-complete');
    }

    public function registrationDeniedForm($id)
    {
        return view('auth.registration-denied', ['id' => $id]);
    }

    public function registrationDenied($id)
    {
        $reason = Input::get('reason');

        $user = User::findOrFail($id);

        DB::table('registrations_denied')->insert([
            'user_id' => $id,
            'reason' => $reason,
            'by_id' => Auth::id()
        ]);

        $user->registration_complete = false;
        $user->save();

        // TODO Send user a email that it was denied with the reason


        return redirect()->route('home');
    }

    public function registrationAccepted($id) {

        $user = User::findOrFail($id);

        $user->registration_complete = true;
        $user->save();

        return redirect()->route('home');
    }
}
