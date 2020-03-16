<?php

namespace FondOfSpryker\Zed\CreditMemoApi\Business;

use FondOfSpryker\Zed\CreditMemoApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\CreditMemoApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\CreditMemoApi\Business\Model\CreditMemoApi;
use FondOfSpryker\Zed\CreditMemoApi\Business\Model\CreditMemoApiInterface;
use FondOfSpryker\Zed\CreditMemoApi\Business\Model\Validator\CreditMemoApiValidator;
use FondOfSpryker\Zed\CreditMemoApi\Business\Model\Validator\CreditMemoApiValidatorInterface;
use FondOfSpryker\Zed\CreditMemoApi\CreditMemoApiDependencyProvider;
use FondOfSpryker\Zed\CreditMemoApi\Dependency\Facade\CreditMemoApiToCreditMemoFacadeInterface;
use FondOfSpryker\Zed\CreditMemoApi\Dependency\QueryContainer\CreditMemoApiToApiQueryContainerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CreditMemoApi\CreditMemoApiConfig getConfig()
 */
class CreditMemoApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CreditMemoApi\Business\Model\CreditMemoApiInterface
     */
    public function createCreditMemoApi(): CreditMemoApiInterface
    {
        return new CreditMemoApi(
            $this->getApiQueryContainer(),
            $this->createTransferMapper(),
            $this->getCreditMemoFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CreditMemoApi\Business\Mapper\TransferMapperInterface
     */
    protected function createTransferMapper(): TransferMapperInterface
    {
        return new TransferMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\CreditMemoApi\Business\Model\Validator\CreditMemoApiValidatorInterface
     */
    public function createCreditMemoApiValidator(): CreditMemoApiValidatorInterface
    {
        return new CreditMemoApiValidator();
    }

    /**
     * @return \FondOfSpryker\Zed\CreditMemoApi\Dependency\QueryContainer\CreditMemoApiToApiQueryContainerInterface
     */
    protected function getApiQueryContainer(): CreditMemoApiToApiQueryContainerInterface
    {
        return $this->getProvidedDependency(CreditMemoApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\CreditMemoApi\Dependency\Facade\CreditMemoApiToCreditMemoFacadeInterface
     */
    protected function getCreditMemoFacade(): CreditMemoApiToCreditMemoFacadeInterface
    {
        return $this->getProvidedDependency(CreditMemoApiDependencyProvider::FACADE_CREDIT_MEMO);
    }
}
