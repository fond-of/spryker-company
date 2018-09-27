<?php

namespace FondOfSpryker\Zed\Company\Business;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Spryker\Zed\Company\Business\CompanyFacadeInterface as BaseCompanyFacadeInterface;

interface CompanyFacadeInterface extends BaseCompanyFacadeInterface
{
    /**
     * Specification:
     * - Retrieves company information by external reference.
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function findCompanyByExternalReference(string $externalReference): CompanyResponseTransfer;
}
