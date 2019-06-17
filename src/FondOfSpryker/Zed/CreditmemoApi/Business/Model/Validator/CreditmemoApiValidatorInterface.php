<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiDataTransfer;

interface CreditmemoApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiValidationException
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer);
}
