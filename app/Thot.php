<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thot extends Model
{
    protected $table = 'thots';

    protected $primaryKey = 'thot_id';

    protected $fillable = [
        'pin_id',
        'poster_name',
        'thot_text',
        'photo_url'
    ];

    public function pin()
    {
        return $this->belongsTo('App\Pin', 'pin_id');
    }
}
