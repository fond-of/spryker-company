<?php

namespace FondOfSpryker\Zed\Company\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Company\Business\Reader\CompanyReader;
use Generated\Shared\Transfer\CompanyCollectionTransfer;
use Generated\Shared\Transfer\CompanyTransfer;

class CompanyFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Company\Business\CompanyFacade
     */
    protected $companyFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Company\Business\CompanyBusinessFactory
     */
    protected $companyBusinessFactory;

    /**
     * @var int
     */
    protected $idCompany;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Company\Business\Reader\CompanyReader
     */
    protected $companyReaderMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyCollectionTransfer
     */
    protected $companyCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessFactory = $this->getMockBuilder(CompanyBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyReaderMock = $this->getMockBuilder(CompanyReader::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyCollectionTransferMock = $this->getMockBuilder(CompanyCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCompany = 1;

        $this->companyFacade = new CompanyFacade();
        $this->companyFacade->setFactory($this->companyBusinessFactory);
    }

    /**
     * @return void
     */
    public function testFindCompanyById(): void
    {
        $this->companyBusinessFactory->expects($this->atLeastOnce())
            ->method('createCompanyReader')
            ->willReturn($this->companyReaderMock);

        $this->companyReaderMock->expects($this->atLeastOnce())
            ->method('findCompanyById')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->companyFacade->findCompanyById($this->idCompany));
    }

    /**
     * @return void
     */
    public function testGetCompanyById(): void
    {
        $this->companyBusinessFactory->expects($this->atLeastOnce())
            ->method('createCompanyReader')
            ->willReturn($this->companyReaderMock);

        $this->companyReaderMock->expects($this->atLeastOnce())
            ->method('getCompanyById')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->companyFacade->getCompanyById($this->companyTransferMock));
    }

    /**
     * @return void
     */
    public function testGetCompanies(): void
    {
        $this->companyBusinessFactory->expects($this->atLeastOnce())
            ->method('createCompanyReader')
            ->willReturn($this->companyReaderMock);

        $this->companyReaderMock->expects($this->atLeastOnce())
            ->method('getCompanies')
            ->willReturn($this->companyCollectionTransferMock);

        $this->assertInstanceOf(CompanyCollectionTransfer::class, $this->companyFacade->getCompanies());
    }
}
