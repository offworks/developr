<?php
namespace Devlife\Api\Controllers;

use Devlife\Abstracts\BaseController;
use Devlife\Abstracts\Spot\Collection;
use Devlife\Abstracts\Spot\SpotEntity;
use Devlife\Api\Controllers\User\UserController;
use Devlife\Context;
use Devlife\Entities\User;
use League\Fractal\Resource\Item;
use Spot\Exception;
use Spot\Locator;

class ApiController extends BaseController
{
    public function middlewareTransform(Context $context)
    {
        $response = $context->next($context);

        if(is_object($response) && $response instanceof SpotEntity) {
            return json_encode($context->fractal->createData(new Item($response, function(SpotEntity $entity) {
                return $entity->transform();
            }))->toArray());
        } else if (is_object($response) && $response instanceof Collection) {
            return json_encode($context->fractal->createData(new Item($response, function(Collection $collection) {
                return $collection->transform();
            }))->toArray());
        }

        return $response;
    }

    /**
     * @path /me
     */
    public function groupUser()
    {
        return UserController::class;
    }

    /**
     * @path /me
     * @inject context, spot
     */
    public function postUser(Context $context, Locator $spot)
    {
        try {
            $user = $spot->mapper(User::class)->create($context->params(array(
                'username', 'password', 'first_name', 'last_name'
            )));
        } catch(Exception $e) {
            echo $e->getMessage();die;
        }

        return $user;
    }
}