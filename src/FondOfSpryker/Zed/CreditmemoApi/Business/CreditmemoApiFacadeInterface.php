<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;

/**
 * @method \FondOfSpryker\Zed\CreditmemoApi\Business\CreditemoApiBusinessFactory getFactory()
 */
interface CreditmemoApiFacadeInterface
{
    /**
     * Specification:
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addCreditmemo(ApiDataTransfer $apiDataTransfer);

    /**
     * Specification:
     * - Validates the given API data and returns an array of errors if necessary.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer);
}
