<?php

namespace Bissolli\NovaInboxTool\Http\Middleware;

use Bissolli\NovaInboxTool\NovaInboxTool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaInboxTool::class)->authorize($request) ? $next($request) : abort(403);
    }
}
