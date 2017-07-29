<?php
namespace Devlife\Providers;

use Exedra\Application;
use Exedra\Contracts\Provider\Provider;

class TwigProvider implements Provider
{
    public function register(Application $app)
    {
        $app->add('@twig', function(Application $app) {
            $twigLoader = new \Twig_Loader_Filesystem((string) $app->path);

            $twig = new \Twig_Environment($twigLoader);

            return $twig;
        });
    }
}