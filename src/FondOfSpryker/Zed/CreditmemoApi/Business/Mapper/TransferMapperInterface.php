<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Mapper;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CreditmemoTransfer
     */
    public function toTransfer(array $data);

    /**
     * @param array $stockEntityCollection
     *
     * @return \Generated\Shared\Transfer\CreditmemoTransfer[]
     */
    public function toTransferCollection(array $stockEntityCollection);
}
