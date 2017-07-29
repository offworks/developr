<?php
namespace Devlife\Entities\User;

use Devlife\Abstracts\Spot\SpotEntity;

class Experience extends SpotEntity
{
    protected static $table = 'user_experience';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'string', 'primary' => true],
            'title' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}