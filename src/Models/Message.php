<?php

namespace Bissolli\NovaInboxTool\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message_thread_id',
        'sender_id',
        'sender_type',
        'body',
        'seen_by_member_at',
        'seen_by_admin_at',
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function sender()
    {
        return $this->morphTo(null, 'sender_type', 'sender_id');
    }
}
