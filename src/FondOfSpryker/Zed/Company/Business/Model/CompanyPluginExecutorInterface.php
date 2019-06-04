<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface as SprykerCompanyPluginExecutorInterface;

interface CompanyPluginExecutorInterface extends SprykerCompanyPluginExecutorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function executeCompanyHydrationPlugins(CompanyTransfer $companyTransfer): CompanyTransfer;
}
