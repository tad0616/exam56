<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'content', 'user_id', 'exam_id', 'score',
    ];

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
