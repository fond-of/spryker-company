<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\Model\CompanyPluginExecutor as SprykerCompanyPluginExecutor;

class CompanyPluginExecutor extends SprykerCompanyPluginExecutor implements CompanyPluginExecutorInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyExtension\Dependency\Plugin\CompanyHydrationPluginInterface[]
     */
    protected $companyHydrationPlugins;

    /**
     * @param \Spryker\Zed\CompanyExtension\Dependency\Plugin\CompanyPreSavePluginInterface[] $companyPreSavePlugins
     * @param \Spryker\Zed\CompanyExtension\Dependency\Plugin\CompanyPostSavePluginInterface[] $companyPostSavePlugins
     * @param \Spryker\Zed\CompanyExtension\Dependency\Plugin\CompanyPostCreatePluginInterface[] $companyPostCreatePlugins
     * @param \FondOfSpryker\Zed\CompanyExtension\Dependency\Plugin\CompanyHydrationPluginInterface[] $companyHydrationPlugins
     */
    public function __construct(
        array $companyPreSavePlugins = [],
        array $companyPostSavePlugins = [],
        array $companyPostCreatePlugins = [],
        array $companyHydrationPlugins = []
    ) {
        parent::__construct($companyPreSavePlugins, $companyPostSavePlugins, $companyPostCreatePlugins);

        $this->companyHydrationPlugins = $companyHydrationPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function executeCompanyHydrationPlugins(CompanyTransfer $companyTransfer): CompanyTransfer
    {
        foreach ($this->companyHydrationPlugins as $companyHydrationPlugin) {
            $companyTransfer = $companyHydrationPlugin->hydrate($companyTransfer);
        }

        return $companyTransfer;
    }
}
