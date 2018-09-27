<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface;
use Generated\Shared\Transfer\CompanyResponseTransfer;

class CompanyReader implements CompanyReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface
     */
    protected $companyRepository;

    /**
     * @param \FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface $companyRepository
     */
    public function __construct(
        CompanyRepositoryInterface $companyRepository
    ) {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function findCompanyByExternalReference(string $externalReference): CompanyResponseTransfer
    {
        $companyTransfer = $this->companyRepository->findCompanyByExternalReference($externalReference);

        $companyResponseTransfer = (new CompanyResponseTransfer())
            ->setIsSuccessful(false);

        if ($companyTransfer !== null) {
            $companyResponseTransfer->setCompanyTransfer($companyTransfer)
                ->setIsSuccessful(true);
        }

        return $companyResponseTransfer;
    }
}
