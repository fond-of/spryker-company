<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\Model\CompanyInterface as BaseCompanyInterface;

interface CompanyInterface extends BaseCompanyInterface
{
    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findByExternalReference(string $externalReference): ?CompanyTransfer;
}
