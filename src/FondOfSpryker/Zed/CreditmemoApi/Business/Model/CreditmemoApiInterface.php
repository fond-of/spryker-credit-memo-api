<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Model;

use Generated\Shared\Transfer\ApiDataTransfer;

interface CreditmemoApiInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer);
}
