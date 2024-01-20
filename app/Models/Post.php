<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title','excerpt','body'];
    protected $guarded=["id"]; // if you leave brackets empty, you disable whole mass assignment

    // public function getRouteKeyName()
    // {
    //     return "slug";
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
