<?php

namespace FondOfSpryker\Zed\CreditmemoApi\Business;

use FondOfSpryker\Zed\CreditmemoApi\Business\Mapper\EntityMapper;
use FondOfSpryker\Zed\CreditmemoApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\CreditmemoApi\Business\Model\CreditmemoApi;
use FondOfSpryker\Zed\CreditmemoApi\Business\Model\Validator\CreditmemoApiValidator;
use FondOfSpryker\Zed\CreditmemoApi\CreditmemoApiDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CreditmemoApi\CreditmemoApiConfig getConfig()
 */
class CreditmemoApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Business\Model\CreditmemoApiInterface
     */
    public function createCreditmemoApi()
    {
        return new CreditmemoApi(
            $this->getApiQueryContainer(),
            $this->createEntityMapper(),
            $this->createTransferMapper(),
            $this->getCreditmemoFacade(),
            $this->getProductFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Business\Mapper\EntityMapperInterface
     */
    public function createEntityMapper()
    {
        return new EntityMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Business\Mapper\TransferMapperInterface
     */
    public function createTransferMapper()
    {
        return new TransferMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Business\Model\Validator\CreditmemoApiValidatorInterface
     */
    public function createCreditmemoApiValidator()
    {
        return new CreditmemoApiValidator();
    }

    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Dependency\QueryContainer\CreditmemoApiToApiInterface
     */
    protected function getApiQueryContainer()
    {
        return $this->getProvidedDependency(CreditmemoApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToCreditmemoInterface
     */
    protected function getCreditmemoFacade()
    {
        return $this->getProvidedDependency(CreditmemoApiDependencyProvider::FACADE_CREDITMEMO);
    }

    /**
     * @return \FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToProductInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(CreditmemoApiDependencyProvider::FACADE_PRODUCT);
    }
}
