<?php

namespace Bissolli\NovaInboxTool\Http\Controllers;

use Bissolli\NovaInboxTool\Models\MessageThread;

class InboxController extends Controller
{
    public function index()
    {
        return MessageThread::with('messages', 'member')
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();
    }
}
