<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'channel',
        'phone_number',
        'contact_id',
        'status',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    // Relationships
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    // Scopes
    public function scopeByChannel($query, $channel)
    {
        return $query->where('channel', $channel);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByPhoneNumber($query, $phoneNumber)
    {
        return $query->where('phone_number', $phoneNumber);
    }

    // Methods
    public function getLastMessage()
    {
        return $this->messages()->latest()->first();
    }

    public function getMessageCount()
    {
        return $this->messages()->count();
    }

    public function markAsResolved()
    {
        $this->status = 'resolved';
        $this->save();
    }

    public function reopen()
    {
        $this->status = 'active';
        $this->save();
    }
}
