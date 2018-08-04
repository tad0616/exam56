<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'title', 'user_id', 'enable',
    ];

    protected $casts = [
        'enable' => 'boolean',
    ];

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
    
    public function tests()
    {
        return $this->hasMany('App\Test');
    }
}
