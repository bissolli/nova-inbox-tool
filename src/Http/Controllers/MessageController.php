<?php

namespace Bissolli\NovaInboxTool\Http\Controllers;

use Bissolli\NovaInboxTool\Http\Requests\MessageRequest;
use Bissolli\NovaInboxTool\Models\Message;
use Bissolli\NovaInboxTool\Models\MessageThread;

class MessageController extends Controller
{
    public function store(MessageRequest $request, MessageThread $thread)
    {
        $message = new Message();
        $message->body = $request->get('body');
        $message->sender()->associate($request->user());

        $thread->messages()->save($message);

        return $message;
    }
}
