<?php
namespace Devlife\Entities\Oauth;

use Devlife\Abstracts\Spot\SpotEntity;

class Client extends SpotEntity
{
    protected static $table = 'oauth_client';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string', 'length' => 40],
            'secret' => ['type' => 'string', 'length' => 50],
            'name' => ['type' => 'string'],
            'endpoint' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}