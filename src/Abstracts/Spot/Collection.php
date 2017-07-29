<?php
namespace Devlife\Abstracts\Spot;

class Collection extends \Spot\Entity\Collection
{
    public function transform()
    {
        $data = array();

        /** @var SpotEntity $entity */
        foreach($this as $entity) {
            $data[] = $entity->transform();
        }

        return $data;
    }
}