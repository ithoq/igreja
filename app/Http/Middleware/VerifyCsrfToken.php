<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "admin/membros", // remover daqui para subir
	    "cadastro/token", //manter
    ];
	
	/*
	 * protected $routes = [
           'api/some/route',
           'another/route/here',
           'yup/more/routes',
   ];
	*/
}
