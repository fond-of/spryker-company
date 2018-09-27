<?php

namespace FondOfSpryker\Zed\Company\Communication\Controller;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Communication\Controller\GatewayController as BaseGatewayController;

/**
 * @method \FondOfSpryker\Zed\Company\Business\CompanyFacadeInterface getFacade()
 */
class GatewayController extends BaseGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function findCompanyByExternalReferenceAction(CompanyTransfer $companyTransfer): CompanyResponseTransfer
    {
        return $this->getFacade()->findCompanyByExternalReference($companyTransfer->getExternalReference());
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function updateAction(CompanyTransfer $companyTransfer): CompanyResponseTransfer
    {
        return $this->getFacade()->update($companyTransfer);
    }
}
