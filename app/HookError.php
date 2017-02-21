<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HookError extends Model
{
    protected $fillable = [
        'error_message',
    ];
}
