<?php
namespace Devlife\Auth\Controllers;

use Devlife\Abstracts\BaseController;
use Devlife\Context;
use Devlife\Entities\User;
use Devlife\Exceptions\Exception;
use Devlife\Services\SpotService;

class AuthController extends BaseController
{
    /**
     * @path /login
     * @method get|post
     * @inject context, spot
     */
    public function executeLogin(Context $context, SpotService $spot)
    {
        if($context->request->isMethod('POST')) {
            $v = $context->validator($params = $context->params(['username', 'password']));
            $v->rule('required', ['username', 'password']);
            $v->perform();

            /** @var User $user */
            $user = $spot->mapper(User::class)->select()
                ->where(['username' => $params['username'], 'email' => $params['username']], 'OR')
                ->first();

            if(!$user || ($user && !password_verify($params['password'], $user->get('password'))))
                throw new Exception('Email/username or password is incorrect');

            $context->session->set('user_id', $user->get('id'));

            return $context->redirect->route('@app.main');
        }

        return $context->render('auth/views/login.twig');
    }

    /**
     * @path /sign-up
     * @method get|post
     * @inject context, spot
     */
    public function executeSignup(Context $context, SpotService $spot)
    {
        if($context->request->isMethod('POST')) {
            $validator = $context->validator($params = $context->params(['username', 'email', 'password']));
            $validator->rule('required', array_keys($params));
            $validator->perform();

            $params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);

            /** @var User $user */
            $user = $spot->mapper(User::class)->create($params);
        }

        return $context->render('auth/views/signup.twig');
    }

    /**
     * @path /forgot
     */
    public function getForgot(Context $context)
    {
        return $context->render('auth/views/forgot.twig');
    }

    public function getLogout()
    {
    }
}