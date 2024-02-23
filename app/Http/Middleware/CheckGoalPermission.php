<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGoalPermission
{
    public function handle($request, Closure $next)
    {
        $goalId = $request->route('goal');
        $user = auth()->user();
    
        if (!$user->canAccessGoal($goalId)) {
            return response()->json(['error' => 'Tidak memiliki izin untuk mengakses tujuan ini.'], 403);
        }
    
        return $next($request);
    }
}
