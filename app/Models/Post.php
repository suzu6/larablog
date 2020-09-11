<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'body',
        'is_draft'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
