<?php

namespace FondOfSpryker\Zed\Company\Business;

use FondOfSpryker\Zed\Company\Business\Model\Company;
use FondOfSpryker\Zed\Company\Business\Model\CompanyReader;
use FondOfSpryker\Zed\Company\Business\Model\CompanyReaderInterface;
use Spryker\Zed\Company\Business\CompanyBusinessFactory as BaseCompanyBusinessFactory;
use Spryker\Zed\Company\Business\Model\CompanyInterface;

/**
 * @method \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface getRepository()
 * @method \Spryker\Zed\Company\Persistence\CompanyEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\Company\CompanyConfig getConfig()
 */
class CompanyBusinessFactory extends BaseCompanyBusinessFactory
{
    /**
     * @return \Spryker\Zed\Company\Business\Model\CompanyInterface
     */
    public function createCompany(): CompanyInterface
    {
        return new Company(
            $this->getRepository(),
            $this->getEntityManager(),
            $this->createPluginExecutor(),
            $this->createStoreRelationWriter()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\Company\Business\Model\CompanyReaderInterface
     */
    public function createCompanyReader(): CompanyReaderInterface
    {
        return new CompanyReader(
            $this->getRepository()
        );
    }
}
