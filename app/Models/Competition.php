<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competitions';

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'prize',
        'team_size',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id');
    }
}