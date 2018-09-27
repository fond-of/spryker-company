<?php

namespace FondOfSpryker\Zed\Company\Business;

use Generated\Shared\Transfer\CompanyResponseTransfer;
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
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function findCompanyByExternalReference(string $externalReference): CompanyResponseTransfer
    {
        return $this->getFactory()
            ->createCompanyReader()
            ->findCompanyByExternalReference($externalReference);
    }
}
