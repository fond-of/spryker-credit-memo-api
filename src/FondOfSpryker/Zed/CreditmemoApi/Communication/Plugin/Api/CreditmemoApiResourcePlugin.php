<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\CreditmemoApi\CreditmemoApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use RuntimeException;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CreditmemoApi\Business\CreditmemoApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\CreditmemoApi\Business\CreditmemoApiBusinessFactory getFactory()
 */
class CreditmemoApiResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
{
    /**
     * @param int $id
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function get($id)
    {
        throw new RuntimeException('Add action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param int $idStock
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function update($idStock, ApiDataTransfer $apiDataTransfer)
    {
        throw new RuntimeException('Update action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function add(ApiDataTransfer $apiDataTransfer)
    {
        return $this->getFacade()->addCreditmemo($apiDataTransfer);
    }

    /**
     * @param int $idStock
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function remove($idStock)
    {
        throw new RuntimeException('Remove action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function find(ApiRequestTransfer $apiRequestTransfer)
    {
        throw new RuntimeException('Find action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getResourceName()
    {
        return CreditmemoApiConfig::RESOURCE_CREDITMEMO;
    }
}
