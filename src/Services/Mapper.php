<?php
namespace Devlife\Services;

use Devlife\Abstracts\Spot\Collection;
use Devlife\Abstracts\Spot\Query;
use Devlife\Exceptions\EntityValidationException;
use Spot\EntityInterface;

class Mapper extends \Spot\Mapper
{
    protected $_queryClass = Query::class;
    protected $_collectionClass = Collection::class;

    public function create(array $data, array $options = array())
    {
        $entity = $this->build($data);
        if ($this->insert($entity, $options)) {
            return $entity;
        }

        throw new EntityValidationException($entity->errors());
    }

    public function save(EntityInterface $entity, array $options = array())
    {
        if(!parent::save($entity, $options))
            throw new EntityValidationException($entity->errors());
    }
}