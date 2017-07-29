<?php
namespace Devlife\Entities\Oauth;

use Devlife\Abstracts\Spot\SpotEntity;

class AccessToken extends SpotEntity
{
    protected static $table = 'oauth_access_token';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string', 'length' => 100],
            'expire_time' => ['type' => 'datetime'],
            'user_id' => ['type' => 'integer'],
            'client_id' => ['type' => 'string', 'length' => 40],
            'name' => ['type' => 'string'],
            'scopes' => ['type' => 'text'],
            'revoked' => ['type' => 'boolean'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}