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
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read',
        'ip_address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Mark the message as read.
     *
     * @return bool
     */
    public function markAsRead()
    {
        return $this->update(['is_read' => true]);
    }

    /**
     * Mark the message as unread.
     *
     * @return bool
     */
    public function markAsUnread()
    {
        return $this->update(['is_read' => false]);
    }
}
