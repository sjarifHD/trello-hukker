<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{
    protected $fillable = [
        'hook_data'
    ];

    protected $casts = [
        'hook_data' => 'object'
    ];

    protected $hidden = array(
        'created_at',
        'updated_at'
    );
}
