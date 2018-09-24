<?php

namespace FondOfSpryker\Zed\Company\Persistence;

use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Persistence\CompanyRepositoryInterface as BaseCompanyRepository;

interface CompanyRepositoryInterface extends BaseCompanyRepository
{
    /**
     * Specification:
     *  - Retrieve a company by CompanyTransfer::externalReference in the transfer
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function getCompanyByExternalReference(string $externalReference): CompanyTransfer;
}
