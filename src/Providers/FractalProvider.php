<?php
namespace Devlife\Providers;

use Devlife\Services\Fractal;
use Exedra\Application;
use Exedra\Contracts\Provider\Provider;

class FractalProvider implements Provider
{
    public function register(Application $app)
    {
        $app->add('@fractal', function() {
            return new Fractal();
        });
    }
}