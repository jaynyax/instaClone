<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowUserController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(User $user){
    
        auth()->user()->following()->toggle($user->profiles);
        return redirect("/");


    }
}
