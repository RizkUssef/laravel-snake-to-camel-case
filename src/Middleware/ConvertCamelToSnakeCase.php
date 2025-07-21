<?php

namespace Rizkussef\SnakeToCamel\Middleware;

use Closure;

class ConvertCamelToSnakeCase
{
    public function handle($request, Closure $next)
    {
        $snakeData = $this->convertKeysToSnakeCase($request->all());
        $request->merge($snakeData);

        return $next($request);
    }

    private function convertKeysToSnakeCase($data)
    {
        if (is_array($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                $newKey = strtolower(preg_replace('/[A-Z]/', '_$0', $key));
                $result[$newKey] = $this->convertKeysToSnakeCase($value);
            }
            return $result;
        }
        return $data;
    }
}
