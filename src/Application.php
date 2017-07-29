<?php namespace Devlife;

use Devlife\Api\Controllers\ApiController;
use Devlife\Auth\Controllers\AuthController;
use Devlife\Providers\FractalProvider;
use Devlife\Providers\OauthProvider;
use Devlife\Providers\SpotProvider;
use Devlife\Providers\TwigProvider;
use Devlife\Services\SpotService;
use Devlife\Services\Validator;
use Devlife\App\Controllers\AppController;
use Devlife\App\Controllers\WebController;
use Exedra\Form\FormProvider;
use Exedra\Session\SessionProvider;
use Exedra\View\ViewProvider;
use Exedron\Routeller\Provider;

/**
 * @property SpotService spot
 * @property \Symfony\Component\Console\Application console
 */
class Application extends \Exedra\Application
{
    protected function setUp()
    {
        parent::setUp();
        $this->setUpRouting();
        $this->setUpPaths();
        $this->setUpMiddlewares();

        $this->factory('runtime.context', Context::class);
        $this->func('@validator', function($data) {
            return new Validator($data);
        });

        $this->setUpProvider();
    }

    protected function setUpProvider()
    {
        $this->provider->add(SpotProvider::class);
        $this->provider->add(Provider::class);
        $this->provider->add(ViewProvider::class);
        $this->provider->add(FormProvider::class);
        $this->provider->add(TwigProvider::class);
        $this->provider->add(SessionProvider::class);
        $this->provider->add(OauthProvider::class);
        $this->provider->add(FractalProvider::class);
    }

    protected function setUpRouting()
    {
        $this->map['api']->any('/api')->group(ApiController::class);
        $this->map['auth']->any('/auth')->group(AuthController::class);
        $this->map['app']->any('/')->group(AppController::class);
    }

    protected function setUpPaths()
    {
        $this->path['api'] = 'api';
        $this->path['auth'] = 'auth';
        $this->path['web'] = 'web';
        $this->path['views'] = '';
    }

    protected function setUpMiddlewares()
    {
        $this->map->middleware(function(Context $context) {
            $context->view->setDefaultData('context', $context);
            $context->addParams($context->request->getParams());
            return $context->next($context);
        });
    }
}

