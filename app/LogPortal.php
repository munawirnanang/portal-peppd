<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPortal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action', 'location', 'ip'
    ];
}
