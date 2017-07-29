<?php
namespace Devlife\Providers;

use Devlife\Services\SpotService;
use Exedra\Application;
use Exedra\Contracts\Provider\Provider;
use Spot\Config;

class SpotProvider implements Provider
{
    public function register(Application $app)
    {
        $config = new Config();
        $config->addConnection('mysql', array(
            'dbname' => 'devlife',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        ));

        $app->add('@spot', function() use ($config) {
            return new SpotService($config);
        });

        $app->func('@mapper', function($entityName) use($app) {
            return $app->spot->mapper($entityName);
        });
    }
}