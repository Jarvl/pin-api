<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $table = 'pins';

    protected $fillable = [
        'pin_title',
        'pin_desc',
        'poster_name',
        'longitude',
        'latitude',
        'source',
    ];

    public function thoughts()
    {
        return $this->hasMany('App\Thought');
    }

    public function scopeSource($query, $source_name)
    {
        return $query->where('data_source', '=', $source_name);
    }
}
