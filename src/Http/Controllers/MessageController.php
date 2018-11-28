<?php

namespace Bissolli\NovaInboxTool\Http\Controllers;

use Bissolli\NovaInboxTool\Http\Requests\MessageRequest;
use Bissolli\NovaInboxTool\Models\Message;
use Bissolli\NovaInboxTool\Models\Thread;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function store(MessageRequest $request, Thread $thread)
    {
        $message = new Message();
        $message->body = $request->get('body');
        $message->seen_by_admin_at = Carbon::now();
        $message->sender()->associate($request->user());

        $thread->messages()->save($message);

        return $message;
    }
}
