<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     /*
     * Fillable
     */
    protected $guarded = [];

    /*
    * Attributes
    */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

     /*
    * Relations
    */
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
