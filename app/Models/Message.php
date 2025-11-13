<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['chat_id','sender_type','body','meta'];
    protected $casts = ['meta' => 'array'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
