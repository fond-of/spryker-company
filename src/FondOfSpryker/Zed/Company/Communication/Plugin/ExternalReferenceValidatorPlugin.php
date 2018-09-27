<?php

namespace FondOfSpryker\Zed\Company\Communication\Plugin;

use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\ResponseMessageTransfer;
use Spryker\Zed\CompanyExtension\Dependency\Plugin\CompanyPreSavePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\Company\Business\CompanyFacadeInterface getFacade()
 */
class ExternalReferenceValidatorPlugin extends AbstractPlugin implements CompanyPreSavePluginInterface
{
    public const COMPANY_EXTERNAL_REFERENCE_INVALID = 'company.external.reference.invalid';
    public const COMPANY_EXTERNAL_REFERENCE_ALREADY_USED = 'company.external.reference.already.used';

    /**
     * Specification:
     * - Plugin is triggered before company is saved.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyResponseTransfer $companyResponseTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyResponseTransfer
     */
    public function preSaveValidation(CompanyResponseTransfer $companyResponseTransfer): CompanyResponseTransfer
    {
        $companyTransfer = $companyResponseTransfer->getCompanyTransfer();

        if (!$companyTransfer) {
            return $companyResponseTransfer;
        }

        $externalReference = $companyTransfer->getExternalReference();

        if (!$externalReference) {
            $companyResponseTransfer->setIsSuccessful(false);
            $companyResponseTransfer->addMessage(
                $this->createResponseMessageTransfer(static::COMPANY_EXTERNAL_REFERENCE_INVALID)
            );

            return $companyResponseTransfer;
        }

        $tempCompanyResponseTransfer = $this->getFacade()->findCompanyByExternalReference($externalReference);

        if (!$tempCompanyResponseTransfer->getIsSuccessful()) {
            return $companyResponseTransfer;
        }

        $tempCompanyTransfer = $tempCompanyResponseTransfer->getCompanyTransfer();

        if ($tempCompanyTransfer && $tempCompanyTransfer->getIdCompany() === $companyTransfer->getIdCompany()) {
            return $companyResponseTransfer;
        }

        $companyResponseTransfer->setIsSuccessful(false);
        $companyResponseTransfer->addMessage(
            $this->createResponseMessageTransfer(static::COMPANY_EXTERNAL_REFERENCE_ALREADY_USED)
        );

        return $companyResponseTransfer;
    }

    /**
     * @param string $message
     *
     * @return \Generated\Shared\Transfer\ResponseMessageTransfer
     */
    protected function createResponseMessageTransfer($message): ResponseMessageTransfer
    {
        $responseMessageTransfer = new ResponseMessageTransfer();
        $responseMessageTransfer->setText($message);
        return $responseMessageTransfer;
    }
}
