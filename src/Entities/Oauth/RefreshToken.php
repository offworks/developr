<?php
namespace Devlife\Entities\Oauth;

use Devlife\Abstracts\Spot\SpotEntity;

class RefreshToken extends SpotEntity
{
    protected static $table = 'oauth_refresh_token';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string', 'primary' => true, 'length' => 100],
            'oauth_access_token_id' => ['type' => 'string', 'length' => 100],
            'expire_time' => ['type' => 'datetime'],
            'revoked' => ['type' => 'boolean'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}