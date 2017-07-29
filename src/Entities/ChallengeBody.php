<?php
namespace Devlife\Entities;

use Devlife\Abstracts\Spot\SpotEntity;

class ChallengeBody extends SpotEntity
{
    protected static $table = 'challenge_body';

    public static function fields()
    {
        return array(
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'challenge_id' => ['type' => 'integer'],
            'value' => ['type' => 'text'],
        );
    }
}