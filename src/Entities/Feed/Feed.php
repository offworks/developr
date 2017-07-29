<?php
namespace Devlife\Entities\Feed;

use Devlife\Abstracts\Spot\SpotEntity;

class Feed extends SpotEntity
{
    protected static $table = 'feed';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string'],
            'type' => ['type' => 'string'],
            'created_user_id' => ['type' => 'integer', 'nullable' => true],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}