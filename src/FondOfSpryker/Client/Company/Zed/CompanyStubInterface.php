<?php

namespace FondOfSpryker\Client\Company\Zed;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Client\Company\Zed\CompanyStubInterface as BaseCompanyStubInterface;

interface CompanyStubInterface extends BaseCompanyStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function updateCompany(CompanyTransfer $companyTransfer): CompanyResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return void
     */
    public function deleteCompany(CompanyTransfer $companyTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyByExternalReference(CompanyTransfer $companyTransfer): CompanyTransfer;
}
