<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profiles extends Model
{
    //
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function profileImage(){

        $path = ($this->image) ? $this->image : "profiles/defaultImg.png";
        return "/storage/".$path;

    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
