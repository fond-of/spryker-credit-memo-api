<?php

namespace FondOfSpryker\Zed\CreditmemoApi;

use FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToCreditmemoBridge;
use FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToProductBridge;
use FondOfSpryker\Zed\CreditmemoApi\Dependency\Facade\CreditmemoApiToProductInterface;
use FondOfSpryker\Zed\CreditmemoApi\Dependency\QueryContainer\CreditmemoApiToApiBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CreditmemoApiDependencyProvider extends AbstractBundleDependencyProvider
{
    const QUERY_CONTAINER_API = 'QUERY_CONTAINER_API';
    const QUERY_CONTAINER = 'QUERY_CONTAINER';

    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_CREDITMEMO = 'FACADE_CREDITMEMO';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->provideApiQueryContainer($container);
        $container = $this->provideQueryContainer($container);
        $container = $this->provideCreditmemoFacade($container);
        $container = $this->provideProductFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideApiQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_API] = function (Container $container) {
            return new CreditmemoApiToApiBridge($container->getLocator()->api()->queryContainer());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER] = function (Container $container) {
            return $container->getLocator()->creditmemo()->queryContainer();
        };
        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideCreditmemoFacade(Container $container)
    {
        $container[static::FACADE_CREDITMEMO] = function (Container $container) {
            return new CreditmemoApiToCreditmemoBridge($container->getLocator()->creditmemo()->facade());
        };
        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideProductFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT] = function (Container $container) {
            return new CreditmemoApiToProductBridge($container->getLocator()->product()->facade());
        };

        return $container;
    }
}
