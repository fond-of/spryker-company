<?php

namespace FondOfSpryker\Client\Company;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Client\Company\CompanyClient as BaseCompanyClient;

/**
 * @method \FondOfSpryker\Client\Company\CompanyFactory getFactory()
 */
class CompanyClient extends BaseCompanyClient implements CompanyClientInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyByExternalReference(CompanyTransfer $companyTransfer): CompanyTransfer
    {
        return $this->getFactory()->createZedCompanyStub()->findCompanyByExternalReference($companyTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function updateCompany(CompanyTransfer $companyTransfer): CompanyResponseTransfer
    {
        return $this->getFactory()->createZedCompanyStub()->updateCompany($companyTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return void
     */
    public function deleteCompany(CompanyTransfer $companyTransfer): void
    {
        $this->getFactory()->createZedCompanyStub()->deleteCompany($companyTransfer);
    }
}
