<?php

namespace Bissolli\NovaInboxTool\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'owner_id',
        'owner_type',
        'member_id',
        'closed_at',
        'closed_by_id',
        'closed_by_type',
        'subject',
        'body',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('novainbox.tables.threads');
    }

    public function owner()
    {
        return $this->morphTo(null, 'owner_type', 'owner_id');
    }

    public function closedBy()
    {
        return $this->morphTo(null, 'closed_by_id', 'closed_by_type');
    }

    public function member()
    {
        return $this->belongsTo(config('novainbox.models.member'));
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
