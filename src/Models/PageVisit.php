<?php

namespace Mina\AnalyzeWebsite\Models;

use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    protected $table = "page_visits";
    protected $fillable = [
        'url',
        'path',
        'method',
        'ip',
        'user_agent',
        'referer',
        'session_id',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
