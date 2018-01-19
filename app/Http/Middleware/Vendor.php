<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Vendor
{
  protected $auth;
  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
  }
  public function handle($request, Closure $next)
  {
    if($this->auth->user()->type === "vendor")
    {
      return $next($request);
    }
    else{
        abort(401);
    }
  }
}
