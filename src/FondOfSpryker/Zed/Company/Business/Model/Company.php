<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Spryker\Zed\Company\Business\Exception\InvalidCompanyCreationException;
use Spryker\Zed\Company\Business\Model\Company as BaseCompany;

class Company extends BaseCompany
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @throws \Spryker\Zed\Company\Business\Exception\InvalidCompanyCreationException
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function create(CompanyTransfer $companyTransfer): CompanyResponseTransfer
    {
        $companyResponseTransfer = (new CompanyResponseTransfer())
            ->setCompanyTransfer($companyTransfer)
            ->setIsSuccessful(true);

        try {
            $companyResponseTransfer = $this->getTransactionHandler()->handleTransaction(function () use ($companyResponseTransfer) {
                $companyResponseTransfer = $this->executeSaveCompanyTransaction($companyResponseTransfer);

                if (!$companyResponseTransfer->getIsSuccessful()) {
                    throw new InvalidCompanyCreationException('Company could not be created');
                }

                $companyResponseTransfer = $this->executePostCreatePlugins($companyResponseTransfer);

                if (!$companyResponseTransfer->getIsSuccessful()) {
                    throw new InvalidCompanyCreationException('Company could not be created');
                }

                return $companyResponseTransfer;
            });
        } catch (InvalidCompanyCreationException $exception) {
            return $companyResponseTransfer;
        }

        return $companyResponseTransfer;
    }
}
