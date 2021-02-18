<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'author'
    ];

    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }
}
