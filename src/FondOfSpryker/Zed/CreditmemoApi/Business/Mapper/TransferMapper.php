<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Mapper;

use Generated\Shared\Transfer\CreditmemoTransfer;

class TransferMapper implements TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\StockProductTransfer
     */
    public function toTransfer(array $data)
    {
        $creditmemoTransfer = new CreditmemoTransfer();
        $creditmemoTransfer->fromArray($data, true);

        return $creditmemoTransfer;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\CreditmemoTransfer[]
     */
    public function toTransferCollection(array $data)
    {
        $transferList = [];
        foreach ($data as $itemData) {
            $transferList[] = $this->toTransfer($itemData);
        }

        return $transferList;
    }
}
