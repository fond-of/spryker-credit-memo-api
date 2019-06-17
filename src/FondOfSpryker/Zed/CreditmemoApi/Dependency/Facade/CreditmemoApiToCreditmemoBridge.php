<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade;

use FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToCreditmemoInterface;
use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Generated\Shared\Transfer\CreditmemoTransfer;

class CreditmemoApiToCreditmemoBridge implements CreditmemoApiToCreditmemoInterface
{
    /**
     * @var \Spryker\Zed\Creditmemo\Business\CredimemoFacadeInterface
     */
    protected $creditmemoFacade;

    /**
     * @param \Spryker\Zed\Creditmemo\Business\CreditmemoFacadeInterface $creditmemoFacade
     */
    public function __construct($creditmemoFacade)
    {
        $this->creditmemoFacade = $creditmemoFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     * @param array $creditmemoItemCollection
     *
     * @return \Generated\Shared\Transfer\CreditmemoResponseTransfer
     */
    public function addCreditmemo(CreditmemoTransfer $creditmemoTransfer, array $creditmemoItemCollection): CreditmemoResponseTransfer
    {
        return $this->creditmemoFacade->addCreditmemo($creditmemoTransfer, $creditmemoItemCollection);
    }

    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     * 
     * @return \Generated\Shared\Transfer\CreditmemoTransfer
     */
    public function findCreditmemoById(CreditmemoTransfer $creditmemoTransfer): CreditmemoTransfer
    {
        return $this->creditmemoFacade->findCreditmemoById($creditmemoTransfer);
    }
}
