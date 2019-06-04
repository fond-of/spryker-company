<?php

namespace FondOfSpryker\Zed\Company;

use Spryker\Zed\Company\CompanyDependencyProvider as SprykerCompanyDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CompanyDependencyProvider extends SprykerCompanyDependencyProvider
{
    public const PLUGINS_COMPANY_HYDRATE = 'PLUGINS_COMPANY_HYDRATE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addCompanyHydrationPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyHydrationPlugins(Container $container): Container
    {
        $container[static::PLUGINS_COMPANY_HYDRATE] = function () {
            return $this->getCompanyHydrationPlugins();
        };

        return $container;
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyExtension\Dependency\Plugin\CompanyHydrationPluginInterface[]
     */
    protected function getCompanyHydrationPlugins(): array
    {
        return [];
    }
}
