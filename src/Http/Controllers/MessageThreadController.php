<?php

namespace Bissolli\NovaInboxTool\Http\Controllers;

use Bissolli\NovaInboxTool\Models\MessageThread;

class MessageThreadController extends Controller
{
    public function show(MessageThread $thread)
    {
        return $thread->load('messages.sender', 'member');
    }
}
