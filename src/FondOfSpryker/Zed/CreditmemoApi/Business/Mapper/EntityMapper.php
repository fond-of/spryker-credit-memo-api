<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Mapper;

use Orm\Zed\Creditmemo\Persistence\FosCreditmemo;
use Orm\Zed\Stock\Persistence\SpyStock;

class EntityMapper implements EntityMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Orm\Zed\Creditmemo\Persistence\FosCreditmemo
     */
    public function toEntity(array $data)
    {
        $creditmemoEntity = new FosCreditmemo();
        $creditmemoEntity->fromArray($data);

        return $creditmemoEntity;
    }

    /**
     * @param array $data
     *
     * @return \Orm\Zed\Creditmemo\Persistence\FosCreditmemo[]
     */
    public function toEntityCollection(array $data)
    {
        $entityList = [];
        foreach ($data as $itemData) {
            $entityList[] = $this->toEntity($itemData);
        }

        return $entityList;
    }
}
