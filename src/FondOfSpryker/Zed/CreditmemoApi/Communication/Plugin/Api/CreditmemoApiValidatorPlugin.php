<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\CreditmemoApi\CreditmemoApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CreditmemoApi\Business\CreditmemoApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\CreditmemoApi\Business\CreditmemoApiBusinessFactory getFactory()
 */
class CreditmemoApiValidatorPlugin extends AbstractPlugin implements ApiValidatorPluginInterface
{
    /**
     * @api
     *
     * @return string
     */
    public function getResourceName()
    {
        return CreditmemoApiConfig::RESOURCE_CREDITMEMO;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiValidationErrorTransfer[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer)
    {
        return $this->getFacade()->validate($apiDataTransfer);
    }
}
