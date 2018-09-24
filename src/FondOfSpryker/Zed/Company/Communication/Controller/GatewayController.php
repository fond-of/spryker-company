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
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyByExternalReferenceAction(CompanyTransfer $companyTransfer): CompanyTransfer
    {
        return $this->getFacade()->findByExternalReference($companyTransfer->getExternalReference());
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return void
     */
    public function deleteAction(CompanyTransfer $companyTransfer): void
    {
        $this->getFacade()->delete($companyTransfer);
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
