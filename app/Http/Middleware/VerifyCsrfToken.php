<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Symfony\Component\HttpFoundation\Cookie;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'bank/*','test/response','/test/pay/smart-pay/response','/pay/smart-pay/response','/test/inv/smart-pay/response'
        ,'/inv/smart-pay/response','/subscribe-us','rupayapay-webhook','/aikonsms/request','/aikonsms/response','/payment-page/response'
        ,'/payment-page/test/response'
    ];



    /**
     * Add the CSRF token to the response cookies.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function addCookieToResponse($request, $response)
    {
        $config = config('session');

        $response->headers->setCookie(
            new Cookie(
                'XSRF-TOKEN', $request->session()->token(), $this->availableAt(60 * $config['lifetime']),
                $config['path'], $config['domain'], $config['secure'], true, false, $config['same_site'] ?? null
            )
        );

        return $response;
    }
}
