<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];
    //kreireanje veze vise - vise
    public function job(){


        return $this->belongsToMany(Job::class);
    }
    use HasFactory;
}
