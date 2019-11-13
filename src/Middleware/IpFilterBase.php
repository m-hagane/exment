<?php

namespace Exceedone\Exment\Middleware;

use Illuminate\Http\Request;
use Exceedone\Exment\Model\System;
use Symfony\Component\HttpFoundation\IpUtils;

/**
 * Middleware as ip address filter.
 * First call. check ip address is permitted.
 */
abstract class IpFilterBase
{
    public function handleBase(Request $request, \Closure $next, $fulterFuncName)
    {
        if (config('exment.ip_filter_disabled', false)) {
            return $next($request);
        }

        $filters = System::{$fulterFuncName}();
        if(is_nullorempty($filters)){
            return $next($request);
        }

        $filters = explode("\r\n", $filters);

        $filters = collect($filters)->filter()->map(function($filter){
            return trim($filter);
        })->toArray();

        if (!IpUtils::checkIp($request->ip(), $filters)) {
            return $this->returnError();
        }

        return $next($request);
    }

    abstract protected function returnError();
}
