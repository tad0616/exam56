<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topic', 'exam_id', 'opt1', 'opt2', 'opt3', 'opt4', 'ans',
    ];

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }
}
