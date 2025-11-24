<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'message',
        'subject',
        'phone',
        'read',
        'replied',
        'read_at',
        'replied_at',
        'ip_address',
        'user_agent',
        'honeypot',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'read' => 'boolean',
        'replied' => 'boolean',
        'read_at' => 'datetime',
        'replied_at' => 'datetime',
    ];

    /**
     * Scope a query to only include unread messages.
     */
    public function scopeUnread($query)
    {
        return $query->where('read', false);
    }

    /**
     * Scope a query to only include read messages.
     */
    public function scopeRead($query)
    {
        return $query->where('read', true);
    }

    /**
     * Scope a query to only include unreplied messages.
     */
    public function scopeUnreplied($query)
    {
        return $query->where('replied', false);
    }

    /**
     * Scope a query to order messages by newest first.
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Mark the message as read.
     */
    public function markAsRead()
    {
        $this->update([
            'read' => true,
            'read_at' => now(),
        ]);
    }

    /**
     * Mark the message as replied.
     */
    public function markAsReplied()
    {
        $this->update([
            'replied' => true,
            'replied_at' => now(),
        ]);
    }

    /**
     * Check if message is spam (honeypot filled).
     */
    public function isSpam(): bool
    {
        return !empty($this->honeypot);
    }
}
