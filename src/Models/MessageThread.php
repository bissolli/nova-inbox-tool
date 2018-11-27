<?php

namespace Bissolli\NovaInboxTool\Models;

use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    public function member()
    {
        return $this->belongsTo(config('novainbox.user_model'));
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
