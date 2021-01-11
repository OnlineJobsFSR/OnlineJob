<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected  $dates = ['deleted_at'];
    protected $fillable = ['title', 'body'];

    public function category() {
        return $this->belongsToMany(Category::class);
    }

    public function user() {
       return $this->belongsTo(User::class);
    }

    use HasFactory;
}
