<?php

namespace Rizkussef\SnakeToCamel\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class ConvertSnakeToCamelCase
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $originalData = $response->getData(true);
            $camelCased = $this->camelizeArray($originalData);
            $response->setData($camelCased);
        }

        return $response;
    }

    private function camelizeArray($data)
    {
        if (is_array($data)) {
            return collect($data)->mapWithKeys(function ($value, $key) {
                $key = is_string($key) ? Str::camel($key) : $key;
                return [$key => $this->camelizeArray($value)];
            })->all();
        }

        return $data;
    }
}
