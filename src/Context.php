<?php
namespace Devlife;
use Devlife\Abstracts\Spot\SpotEntity;
use Devlife\Entities\User;
use Devlife\Exceptions\AccessException;
use Devlife\Services\Fractal;
use Devlife\Services\Mapper;
use Devlife\Services\Validator;
use Exedra\Session\Session;
use Exedra\View\Factory;

/**
 * @property Factory view
 * @property \Twig_Environment twig
 * @property Session session
 * @property User user
 * @property Fractal fractal
 * @method Validator validator(array $data)
 * @method Mapper mapper($name)
 */
class Context extends \Exedra\Runtime\Context
{
    /**
     * @param $name
     * @param array $data
     * @return mixed|string
     */
    public function render($name, array $data = array())
    {
        if(strpos($name, '.php') !== false)
            return $this->view->create(str_replace('.php', '', $name), $data)->render();

        if(strpos($name, '.twig') !== false) {
            $data['context'] = $this;

            return $this->twig->render($name, $data);
        }

        return $this->view->create($name, $data)->render();
    }

    public function setUp()
    {
        parent::setUp();

        $this->add('user', function(Context $context) {
            if($context->session->has('user_id'))
                return $context->mapper(User::class)->get($context->session->get('user_id'));

            throw new AccessException('User is not logged in.');
        });
    }
}

