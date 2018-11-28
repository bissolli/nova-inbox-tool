<?php

namespace Bissolli\NovaInboxTool\Http\Controllers;

use Bissolli\NovaInboxTool\Models\Thread;

class ThreadController extends Controller
{
    public function show(Thread $thread)
    {
        return $thread->load('messages.sender', 'member');
    }
}
