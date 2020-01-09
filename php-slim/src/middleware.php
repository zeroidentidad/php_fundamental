<?php
// Application middleware
// e.g: $app->add(new \Slim\Csrf\Guard);

class ExampleMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $token = $request->getHeader('APP-TOKEN');


        if(empty($token)) {
            return $response->withStatus(401);
        }

        return $next($request, $response);
    }
}