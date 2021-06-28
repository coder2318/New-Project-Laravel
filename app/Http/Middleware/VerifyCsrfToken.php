<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'product/*',
        'jdsfjasjfad;fjslgal;bl;akgl;kl;fks;kd;lsfk;adskf;dksl;fkadsfkadl;fkdkd;fkldkf'
    ];
}
