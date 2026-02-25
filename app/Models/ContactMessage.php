<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'service',
        'subject',
        'message',
        'status',
        'admin_notes',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Scope for new messages
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    // Scope for read messages
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    // Scope for unread messages (new + read but not replied)
    public function scopeUnread($query)
    {
        return $query->whereIn('status', ['new', 'read']);
    }

    // Mark as read
    public function markAsRead()
    {
        if ($this->status === 'new') {
            $this->update([
                'status' => 'read',
                'read_at' => now(),
            ]);
        }
    }

    // Mark as replied
    public function markAsReplied()
    {
        $this->update(['status' => 'replied']);
    }

    // Archive message
    public function archive()
    {
        $this->update(['status' => 'archived']);
    }

    // Get status badge color
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'new' => 'badge-warning',
            'read' => 'badge-primary',
            'replied' => 'badge-success',
            'archived' => 'badge-secondary',
            default => 'badge-secondary',
        };
    }

    // Get status label
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'new' => 'Baru',
            'read' => 'Dibaca',
            'replied' => 'Dibalas',
            'archived' => 'Arsip',
            default => 'Unknown',
        };
    }
}