<?php

namespace FondOfSpryker\Zed\Company\Business;

use FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutor;
use FondOfSpryker\Zed\Company\Business\Reader\CompanyReader;
use Spryker\Zed\Company\Business\CompanyBusinessFactory as SprykerCompanyBusinessFactory;
use Spryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface;
use Spryker\Zed\Company\Business\Reader\CompanyReaderInterface;

/**
 * @method \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface getRepository()
 * @method \Spryker\Zed\Company\Persistence\CompanyEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\Company\CompanyConfig getConfig()
 */
class CompanyBusinessFactory extends SprykerCompanyBusinessFactory
{
    /**
     * @return \Spryker\Zed\Company\Business\Reader\CompanyReaderInterface
     */
    public function createCompanyReader(): CompanyReaderInterface
    {
        /** @var \FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface $pluginExecutor */
        $pluginExecutor = $this->createPluginExecutor();

        return new CompanyReader(
            $this->getRepository(),
            $pluginExecutor
        );
    }

    /**
     * @return \Spryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface
     */
    protected function createPluginExecutor(): CompanyPluginExecutorInterface
    {
        return new CompanyPluginExecutor(
            $this->getCompanyPreSavePlugins(),
            $this->getCompanyPostSavePlugins(),
            $this->getCompanyPostCreatePlugins()
        );
    }
}
