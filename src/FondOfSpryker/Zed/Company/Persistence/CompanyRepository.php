<?php

namespace FondOfSpryker\Zed\Company\Persistence;

use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Persistence\CompanyRepository as BaseCompanyRepository;

/**
 * @method \Spryker\Zed\Company\Persistence\CompanyPersistenceFactory getFactory()
 */
class CompanyRepository extends BaseCompanyRepository implements CompanyRepositoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function getCompanyByExternalReference(string $externalReference): CompanyTransfer
    {
        $spyCompany = $this->getFactory()
            ->createCompanyQuery()
            ->filterByExternalReference($externalReference)
            ->findOne();

        return $this->getFactory()
            ->createCompanyMapper()
            ->mapEntityToCompanyTransfer($spyCompany, new CompanyTransfer());
    }
}