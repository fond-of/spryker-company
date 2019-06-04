<?php

namespace FondOfSpryker\Zed\Company\Business;

use Generated\Shared\Transfer\CompanyCollectionTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\CompanyFacade as BaseCompanyFacade;

/**
 * @method \FondOfSpryker\Zed\Company\Business\CompanyBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface getRepository()
 * @method \Spryker\Zed\Company\Persistence\CompanyEntityManagerInterface getEntityManager()
 */
class CompanyFacade extends BaseCompanyFacade implements CompanyFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idCompany
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findCompanyById(int $idCompany): ?CompanyTransfer
    {
        /** @var \FondOfSpryker\Zed\Company\Business\Reader\CompanyReaderInterface $companyReader */
        $companyReader = $this->getFactory()->createCompanyReader();

        return $companyReader->findCompanyById($idCompany);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function getCompanyById(CompanyTransfer $companyTransfer): CompanyTransfer
    {
        /** @var \FondOfSpryker\Zed\Company\Business\Reader\CompanyReaderInterface $companyReader */
        $companyReader = $this->getFactory()->createCompanyReader();

        return $companyReader->getCompanyById($companyTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\CompanyCollectionTransfer
     */
    public function getCompanies(): CompanyCollectionTransfer
    {
        /** @var \FondOfSpryker\Zed\Company\Business\Reader\CompanyReaderInterface $companyReader */
        $companyReader = $this->getFactory()->createCompanyReader();

        return $companyReader->getCompanies();
    }
}
