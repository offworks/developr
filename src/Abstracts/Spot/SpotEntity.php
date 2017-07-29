<?php
namespace Devlife\Abstracts\Spot;

use Devlife\Services\Mapper;
use League\Fractal\Resource\ResourceInterface;
use Spot\Entity;

class SpotEntity extends Entity
{
    protected static $mapper = Mapper::class;

    protected static $visible = [];

    public function transform()
    {
        $data = [];

        foreach(static::$visible as $field) {
            $data[$field] = $this->get($field);
        }

        return $data;
    }
}