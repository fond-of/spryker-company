<?php

namespace FondOfSpryker\Zed\Company\Business;

use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\CompanyFacadeInterface as BaseCompanyFacadeInterface;

interface CompanyFacadeInterface extends BaseCompanyFacadeInterface
{
    /**
     * Specification:
     * - Retrieves company information by external reference.
     *
     * @api
     *
     * Specification:
     *  - Finds company by external reference
     *  - Returns company transfer
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findByExternalReference(string $externalReference): CompanyTransfer;
}
