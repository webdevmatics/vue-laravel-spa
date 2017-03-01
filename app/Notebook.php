<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = ['name', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
