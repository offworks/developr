<?php
require_once __DIR__ . '/vendor/autoload.php';

\Exedra\Support\Autoloader::getInstance()->autoloadPsr4('Devlife\\', __DIR__ . '/src');
\Exedra\Support\Autoloader::getInstance()->autoloadPsr4('Devlife\\Api', __DIR__ . '/api/src');
\Exedra\Support\Autoloader::getInstance()->autoloadPsr4('Devlife\\App', __DIR__ . '/app/src');
\Exedra\Support\Autoloader::getInstance()->autoloadPsr4('Devlife\\Auth', __DIR__ . '/auth/src');

$app = new \Devlife\Application(__DIR__);

return $app;