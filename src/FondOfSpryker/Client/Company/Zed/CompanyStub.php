<?php

namespace FondOfSpryker\Client\Company\Zed;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Client\Company\Zed\CompanyStub as BaseCompanyStub;

class CompanyStub extends BaseCompanyStub implements CompanyStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function updateCompany(CompanyTransfer $companyTransfer): CompanyResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyResponseTransfer $companyResponseTransfer */
        $companyResponseTransfer = $this->zedRequestClient->call('/company/gateway/update', $companyTransfer);

        return $companyResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return void
     */
    public function deleteCompany(CompanyTransfer $companyTransfer): void
    {
        /** @var \Spryker\Client\ZedRequest\Client\Response $response */
        $response = $this->zedRequestClient->call('/company/gateway/delete', $companyTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyByExternalReference(CompanyTransfer $companyTransfer): CompanyTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyTransfer $companyTransfer */
        $companyTransfer = $this->zedRequestClient->call('/company/gateway/find-company-by-external-reference', $companyTransfer);

        return $companyTransfer;
    }
}
