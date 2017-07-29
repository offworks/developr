<?php
namespace Devlife\Entities\User;

use Devlife\Abstracts\Spot\SpotEntity;

class Feed extends SpotEntity
{
    protected static $table = 'user_feed';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string', 'primary' => true],
            'feed_id' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}