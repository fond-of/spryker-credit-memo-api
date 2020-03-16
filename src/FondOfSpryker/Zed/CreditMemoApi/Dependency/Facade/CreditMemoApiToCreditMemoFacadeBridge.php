<?php

namespace FondOfSpryker\Zed\CreditMemoApi\Dependency\Facade;

use FondOfSpryker\Zed\CreditMemo\Business\CreditMemoFacadeInterface;
use Generated\Shared\Transfer\CreditMemoResponseTransfer;
use Generated\Shared\Transfer\CreditMemoTransfer;

class CreditMemoApiToCreditMemoFacadeBridge implements CreditMemoApiToCreditMemoFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\CreditMemo\Business\CreditMemoFacadeInterface
     */
    protected $creditMemoFacade;

    /**
     * @param \FondOfSpryker\Zed\CreditMemo\Business\CreditMemoFacadeInterface $creditMemoFacade
     */
    public function __construct(CreditMemoFacadeInterface $creditMemoFacade)
    {
        $this->creditMemoFacade = $creditMemoFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CreditMemoTransfer $creditMemoTransfer
     *
     * @return \Generated\Shared\Transfer\CreditMemoResponseTransfer
     */
    public function createCreditMemo(
        CreditMemoTransfer $creditMemoTransfer
    ): CreditMemoResponseTransfer {
        return $this->creditMemoFacade->createCreditMemo($creditMemoTransfer);
    }
}
