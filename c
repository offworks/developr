<?php
/** @var \Devlife\Application $app */
$app = require_once __DIR__ .'/app.php';

$app->provider->add(\Exedra\Console\ConsoleProvider::class);

$app->console->add(new \Devlife\Console\Commands\MigrateCommand($app));

$app->console->run();