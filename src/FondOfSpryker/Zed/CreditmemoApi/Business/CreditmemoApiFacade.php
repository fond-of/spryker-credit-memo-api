<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CreditmemoApi\Business\CreditmemoApiBusinessFactory getFactory()
 */
class CreditmemoApiFacade extends AbstractFacade implements CreditmemoApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addCreditmemo(ApiDataTransfer $apiDataTransfer)
    {
         return $this->getFactory()
            ->createCreditmemoApi()
            ->add($apiDataTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer)
    {
        return $this->getFactory()
            ->createCreditmemoApiValidator()
            ->validate($apiDataTransfer);
    }
}
