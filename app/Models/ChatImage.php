<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatImage extends Model
{
    use HasFactory;

    protected $table = 'chat_images';

    protected $guarded = [];

    public $timestamps = false;
}
