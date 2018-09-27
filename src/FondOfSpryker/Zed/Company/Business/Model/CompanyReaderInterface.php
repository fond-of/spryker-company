<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use Generated\Shared\Transfer\CompanyResponseTransfer;

interface CompanyReaderInterface
{
    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function findCompanyByExternalReference(string $externalReference): CompanyResponseTransfer;
}
