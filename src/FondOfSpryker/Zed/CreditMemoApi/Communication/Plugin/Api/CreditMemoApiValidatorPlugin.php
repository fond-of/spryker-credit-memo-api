<?php

namespace FondOfSpryker\Zed\CreditMemoApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\CreditMemoApi\CreditMemoApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CreditMemoApi\Business\CreditMemoApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\CreditMemoApi\Business\CreditMemoApiBusinessFactory getFactory()
 */
class CreditMemoApiValidatorPlugin extends AbstractPlugin implements ApiValidatorPluginInterface
{
    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return CreditMemoApiConfig::RESOURCE_CREDIT_MEMO;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiValidationErrorTransfer[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array
    {
        return $this->getFacade()->validate($apiDataTransfer);
    }
}
