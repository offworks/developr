<?php
namespace Devlife\Entities;

use Devlife\Abstracts\Spot\SpotEntity;

class User extends SpotEntity
{
    protected static $table = 'user';

    protected static $visible = ['id', 'username', 'email', 'first_name', 'last_name', 'created_at', 'updated_at'];

    public static function fields()
    {
        return array(
            'id' => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'username' => ['type' => 'string', 'unique' => true],
            'email' => ['type' => 'string', 'required' => true, 'unique' => true],
            'password' => ['type' => 'string'],
            'first_name' => ['type' => 'string'],
            'last_name' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime', 'value' => new \DateTime()],
            'updated_at' => ['type' => 'datetime', 'value' => new \DateTime()]
        );
    }
}