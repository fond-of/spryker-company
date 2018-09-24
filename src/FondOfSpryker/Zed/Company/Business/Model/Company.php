<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\Model\Company as BaseCompany;
use Spryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface;
use Spryker\Zed\Company\Business\Model\CompanyStoreRelationWriterInterface;
use Spryker\Zed\Company\Persistence\CompanyEntityManagerInterface;

class Company extends BaseCompany implements CompanyInterface
{
    /**
     * @param \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface $companyRepository
     * @param \Spryker\Zed\Company\Persistence\CompanyEntityManagerInterface $companyEntityManager
     * @param \Spryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface $companyPluginExecutor
     * @param \Spryker\Zed\Company\Business\Model\CompanyStoreRelationWriterInterface $companyStoreRelationWriter
     */
    public function __construct(
        CompanyRepositoryInterface $companyRepository,
        CompanyEntityManagerInterface $companyEntityManager,
        CompanyPluginExecutorInterface $companyPluginExecutor,
        CompanyStoreRelationWriterInterface $companyStoreRelationWriter
    ) {

        parent::__construct(
            $companyRepository,
            $companyEntityManager,
            $companyPluginExecutor,
            $companyStoreRelationWriter
        );
    }

    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findByExternalReference(string $externalReference): ?CompanyTransfer
    {
        $companyEntity = $this->companyRepository
            ->getCompanyByExternalReference($externalReference);

        if ($companyEntity === null) {
            return null;
        }

        $companyTransfer = (new CompanyTransfer())->fromArray($companyEntity->toArray(), true);

        return $companyTransfer;
    }
}
