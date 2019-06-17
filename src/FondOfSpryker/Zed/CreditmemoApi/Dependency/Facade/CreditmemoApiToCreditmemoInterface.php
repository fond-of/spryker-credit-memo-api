<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade;

use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Generated\Shared\Transfer\CreditmemoTransfer;

interface CreditmemoApiToCreditmemoInterface
{
    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     * @param array $creditmemoItemCollection
     * 
     * @return \Generated\Shared\Transfer\CreditmemoResponseTransfer
     */
    public function addCreditmemo(CreditmemoTransfer $creditmemoTransfer, array $creditmemoItemCollection): CreditmemoResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     *
     * @return \Generated\Shared\Transfer\CreditmemoTransfer
     */
    public function findCreditmemoById(CreditmemoTransfer $creditmemoTransfer): CreditmemoTransfer;
}
