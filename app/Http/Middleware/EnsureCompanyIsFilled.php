<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
use App\Models\BusinessUnit;

class EnsureCompanyIsFilled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hasCompany = Company::exists();
        $hasBusinessUnit = BusinessUnit::exists();
        if (!$hasCompany && ! $request->routeIs(['company.edit', 'company.update'])) {
            return redirect()->route('company.edit')
            ->with('error', 'Please fill in your company details first.');
        } elseif ($hasCompany && ! $hasBusinessUnit && ! $request->routeIs(
            [
                'business-units.index', 
                'business-units.edit', 
                'business-units.create', 
                'business-units.store', 
                'business-units.update',
                'company.edit',
                'company.update'
            ]
            )) {
                return redirect()->route('business-units.index')
                ->with('error', 'Please create a business unit first.');
        } 
        return $next($request);
    }
}
