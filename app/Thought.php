<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thought extends Model
{
    protected $table = 'thoughts';

    protected $fillable = [
        'pin_id',
        'poster_name',
        'thought_text',
    ];

    public function pin()
    {
        return $this->belongsTo('App\Pin', 'pin_id');
    }
}
