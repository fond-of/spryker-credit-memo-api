<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Mapper;

interface EntityMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Orm\Zed\Creditmemo\Persistence\FosCreditmemo
     */
    public function toEntity(array $data);

    /**
     * @param array $creditmemoApiDataCollection
     *
     * @return \Orm\Zed\Creditmemo\Persistence\FosCreditmemo[]
     */
    public function toEntityCollection(array $creditmemoApiDataCollection);
}
