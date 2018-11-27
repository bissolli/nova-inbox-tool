<?php

namespace Bissolli\NovaInboxTool\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function messageThread()
    {
        return $this->belongsTo(MessageThread::class);
    }

    public function sender()
    {
        return $this->morphTo(null, 'sender_type', 'sender_id');
    }
}
