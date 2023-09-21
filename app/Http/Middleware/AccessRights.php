<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (in_array($request->user()->role, $roles)) {
        return $next($request);    
        return redirect()->back()->with('error','Only Admin Can Update and Delete');
    }
    return redirect('/');
    
}

// public function destroy(Request $request, $employeeid)
// {
//     // Memeriksa izin admin
//     if (!auth()->user()->isAdmin()) {
//         return redirect()->back()->with('error', 'Hanya admin yang bisa melakukan delete.');
//     }

//     // Logika penghapusan data Employee
// }

// public function update(Request $request, $employeeid)
// {
//     // Memeriksa izin admin
//     if (!auth()->user()->isAdmin()) {
//         return redirect()->back()->with('error', 'Hanya admin yang bisa melakukan update.');
//     }

//     // Logika pembaruan data Employee
// }

}