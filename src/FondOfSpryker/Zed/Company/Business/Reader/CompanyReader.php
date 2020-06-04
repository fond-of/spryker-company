<?php

namespace FondOfSpryker\Zed\Company\Business\Reader;

use FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface;
use FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface;
use Generated\Shared\Transfer\CompanyCollectionTransfer;
use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\Reader\CompanyReader as SprykerCompanyReader;

class CompanyReader extends SprykerCompanyReader implements CompanyReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface
     */
    protected $companyPluginExecutor;

    /**
     * @param \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface $companyRepository
     * @param \FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface $companyPluginExecutor
     */
    public function __construct(
        CompanyRepositoryInterface $companyRepository,
        CompanyPluginExecutorInterface $companyPluginExecutor
    ) {
        parent::__construct($companyRepository);

        $this->companyPluginExecutor = $companyPluginExecutor;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function findCompanyByUuid(CompanyTransfer $companyTransfer): CompanyResponseTransfer
    {
        $companyResponseTransfer = parent::findCompanyByUuid($companyTransfer);

        if ($companyResponseTransfer->getIsSuccessful() !== true) {
            return $companyResponseTransfer;
        }

        $companyTransfer = $companyResponseTransfer->getCompanyTransfer();
        $this->companyPluginExecutor->executeCompanyHydrationPlugins($companyTransfer);

        return $companyResponseTransfer;
    }

    /**
     * @param int $idCompany
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findCompanyById(int $idCompany): ?CompanyTransfer
    {
        $companyTransfer = $this->companyRepository->findCompanyById($idCompany);

        if ($companyTransfer === null) {
            return $companyTransfer;
        }

        return $this->companyPluginExecutor->executeCompanyHydrationPlugins($companyTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function getCompanyById(CompanyTransfer $companyTransfer): CompanyTransfer
    {
        $companyTransfer->requireIdCompany();

        $companyTransfer = $this->companyRepository->getCompanyById($companyTransfer->getIdCompany());

        return $this->companyPluginExecutor->executeCompanyHydrationPlugins($companyTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\CompanyCollectionTransfer
     */
    public function getCompanies(): CompanyCollectionTransfer
    {
        $companyCollectionTransfer = $this->companyRepository->getCompanies();

        foreach ($companyCollectionTransfer->getCompanies() as $companyTransfer) {
            $this->companyPluginExecutor->executeCompanyHydrationPlugins($companyTransfer);
        }

        return $companyCollectionTransfer;
    }
}
