<?php

namespace FondOfSpryker\Client\Company;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Client\Company\CompanyClientInterface as BaseCompanyClientInterface;

interface CompanyClientInterface extends BaseCompanyClientInterface
{
    /**
     * Specification:
     *  - Retrieve a company by CompanyTransfer::externalReference in the transfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyByExternalReference(CompanyTransfer $companyTransfer): CompanyTransfer;

    /**
     * Specification:
     * - Updates an existing company.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function updateCompany(CompanyTransfer $companyTransfer): CompanyResponseTransfer;

    /**
     * Specification:
     * - Deletes an existing company.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return void
     */
    public function deleteCompany(CompanyTransfer $companyTransfer): void;
}
