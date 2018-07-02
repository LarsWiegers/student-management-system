<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $actionNeededUsers = User::where('registration_complete','=',0)->get();

        $needRegistrationApprovalUsers = new Collection();

        foreach($actionNeededUsers as $user) {
            $exist = DB::table('registrations_denied')
                ->where('user_id','=', $user->id)
                ->get()->count();
            if($exist < 0) {
                $needRegistrationApprovalUsers->push($user);
            }
        }

        return view('home',[
            'registrationUsers' => $needRegistrationApprovalUsers
        ]);
    }
}
