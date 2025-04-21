<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Chatify\ChatifyMessenger;

class CustomChatify extends ChatifyMessenger
{
    use HasFactory;
}
