<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    
    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'user_id',
        'user_name'
    ];
}
