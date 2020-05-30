<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;

class ProfilesController extends Controller
{
    //
    public function index(User $user){
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount =  Cache::remember('post.count'.$user->id,now()->addSeconds(30),function() use ($user){
            return $user->posts->count();
        });

       
        $followersCount = Cache::remember('followers.count'.$user->id,now()->addSeconds(30),
        function() use ($user){
            return $user->profiles->followers->count();
        });

        $followingCount = Cache::remember('following.count'.$user->id,now()->addSeconds(30),
        function() use ($user){
            return $user->following->count();
        });

     
        return view('profiles.index',[
            'users'=>$user,
            'follows'=>$follows,
            'postCount'=>$postCount,
            'followersCount'=>$followersCount,
            'followingCount' =>$followingCount,
        ]);
    }

    public function edit(User $user){
        $this->authorize('update',$user->profiles);
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user){
        $this->authorize('update',$user->profiles);
        $data = request()->validate([
                'title'=>'required',
                'description' =>'required',
                'url' => 'url',
                'image' =>'',

        ]);

        if(request('image')){
            $imagePath = request("image")->store('profiles','public');
            
            $imageArr = [ 'image'=>$imagePath];
        }
       
        auth()->user()->profiles->update(array_merge(
            $data,
            $imageArr ?? []
         
        ));
        return redirect("/profile/{$user->id}");

    }

  
}
