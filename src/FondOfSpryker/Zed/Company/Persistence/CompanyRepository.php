<?php

namespace FondOfSpryker\Zed\Company\Persistence;

use ArrayObject;
use Generated\Shared\Transfer\CompanyCollectionTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Persistence\CompanyRepository as SprykerCompanyRepository;

/**
 * @method \Spryker\Zed\Company\Persistence\CompanyPersistenceFactory getFactory()
 */
class CompanyRepository extends SprykerCompanyRepository implements CompanyRepositoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\CompanyCollectionTransfer
     */
    public function getCompanies(): CompanyCollectionTransfer
    {
        $spyCompanies = $this->getFactory()->createCompanyQuery()->find();

        $companyTransfers = new ArrayObject();
        foreach ($spyCompanies as $companyEntity) {
            $companyTransfer = $this->getFactory()
                ->createCompanyMapper()
                ->mapEntityToCompanyTransfer($companyEntity, new CompanyTransfer());


            $companyTransfers->append($companyTransfer);
        }

        $companyTypeCollection = new CompanyCollectionTransfer();
        $companyTypeCollection->setCompanies($companyTransfers);

        return $companyTypeCollection;
    }
}
