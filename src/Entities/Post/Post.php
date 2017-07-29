<?php
namespace Devlife\Entities\Post;

use Devlife\Abstracts\Spot\SpotEntity;

class Post extends SpotEntity
{
    protected static $table = 'post';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string', 'primary' => true],
            'title' => ['type' => 'string'],
            'type' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}