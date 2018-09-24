<?php

namespace FondOfSpryker\Client\Company;

use FondOfSpryker\Client\Company\Zed\CompanyStub;
use Spryker\Client\Company\CompanyFactory as BaseCompanyFactory;
use Spryker\Client\Company\Zed\CompanyStubInterface;

class CompanyFactory extends BaseCompanyFactory
{
    /**
     * @return \Spryker\Client\Company\Zed\CompanyStubInterface
     */
    public function createZedCompanyStub(): CompanyStubInterface
    {
        return new CompanyStub($this->getZedRequestClient());
    }
}
