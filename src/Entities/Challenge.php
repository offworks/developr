<?php
namespace Devlife\Entities;

use Devlife\Abstracts\Spot\SpotEntity;

class Challenge extends SpotEntity
{
    protected static $table = 'challenge';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'title' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime']
        );
    }
}