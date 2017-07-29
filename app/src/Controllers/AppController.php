<?php
namespace Devlife\App\Controllers;

use Devlife\Abstracts\BaseController;
use Devlife\Context;
use Devlife\App\Controllers\Flow\FlowController;

class AppController extends BaseController
{
    public function middleware(Context $context)
    {
        if (!$context->session->has('user_id')) {
            if (!$context->request->isAjax())
                return $context->forward('@auth.login');
        }

        return $context->next($context);
    }

    /**
     * @name main
     * @return \Exedra\Runtime\Context
     */
    public function get(Context $context)
    {
        return $context->render('app/views/main.php');
    }

    /**
     * @path /flow
     */
    public function groupFlow()
    {
        return FlowController::class;
    }
}