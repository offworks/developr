<?php
namespace Devlife\Entities\Feed;

use Devlife\Abstracts\Spot\SpotEntity;

class Item extends SpotEntity
{
    protected static $table = 'feed_item';

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