<?php

namespace App\Http\Middleware\PrivillageAccess;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Privillage;

class Level1Access
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    if (Privillage::where('np_user', Auth::user()->np)->value('level_user') >= 1) {
      return $next($request);
    } else {
      return response()->view('layouts.403');
    }
  }
}
