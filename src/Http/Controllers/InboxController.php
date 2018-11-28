<?php

namespace Bissolli\NovaInboxTool\Http\Controllers;

use Bissolli\NovaInboxTool\Models\Thread;

class InboxController extends Controller
{
    public function index()
    {
        return Thread::with('messages', 'member', 'owner', 'closedBy')
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();
    }
}
