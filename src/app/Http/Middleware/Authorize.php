<?php

namespace App\Http\Middleware;

use Closure;
use Str;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $ability
     * @param  array|null  ...$parameter_pairs
     * @return mixed
     */
    public function handle($request, Closure $next, $ability, ...$parameter_pairs)
    {
        foreach ($parameter_pairs as $pair) {
            $model = Str::before($pair, ':');
            $parameter = str_contains($pair, ':') ? Str::after($pair, ':') : 'id';
            $model_class = 'App\\Models\\'.ucfirst($model);
            $model_id = $request->route($parameter);

            $model_instance = $model_class::findOrFail($model_id);
            if ($request->user()->cannot($ability, $model_instance)) {
                abort(403, "Unauthorized action on {$model}.");
            }
        }

        return $next($request);
    }
}
