<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHistory extends Model
{
    protected $fillable = [
        'event_date',
        'post_no',
        'total_rows',
        'postedBy_id',
        'created_at'
    ];
}
