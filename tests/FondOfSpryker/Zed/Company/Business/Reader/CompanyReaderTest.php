<?php

namespace FondOfSpryker\Zed\Company\Business\Reader;

use ArrayObject;
use Codeception\Test\Unit;
use FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface;
use FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface;
use Generated\Shared\Transfer\CompanyCollectionTransfer;
use Generated\Shared\Transfer\CompanyResponseTransfer;
use Generated\Shared\Transfer\CompanyTransfer;

class CompanyReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Company\Business\Reader\CompanyReader
     */
    protected $companyReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Company\Persistence\CompanyRepositoryInterface
     */
    protected $companyRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutorInterface
     */
    protected $companyPluginExecutorInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var int
     */
    protected $uuid;

    /**
     * @var int
     */
    protected $idCompany;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyCollectionTransfer
     */
    protected $companyCollectionTransferMock;

    /**
     * @var \ArrayObject
     */
    protected $companyTransferMocks;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyRepositoryInterfaceMock = $this->getMockBuilder(CompanyRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyPluginExecutorInterfaceMock = $this->getMockBuilder(CompanyPluginExecutorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyCollectionTransferMock = $this->getMockBuilder(CompanyCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyTransferMocks = new ArrayObject([
            $this->companyTransferMock,
        ]);

        $this->uuid = 1;

        $this->idCompany = 1;

        $this->companyReader = new CompanyReader($this->companyRepositoryInterfaceMock, $this->companyPluginExecutorInterfaceMock);
    }

    /**
     * @return void
     */
    public function testFindCompanyByUuid(): void
    {
        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyByUuid')
            ->willReturn($this->companyTransferMock);

        $this->companyPluginExecutorInterfaceMock->expects($this->atLeastOnce())
            ->method('executeCompanyHydrationPlugins')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyResponseTransfer::class, $this->companyReader->findCompanyByUuid($this->companyTransferMock));
    }

    /**
     * @return void
     */
    public function testFindCompanyByUuidIsNotSuccessful(): void
    {
        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyByUuid')
            ->willReturn(null);

        $this->assertInstanceOf(CompanyResponseTransfer::class, $this->companyReader->findCompanyByUuid($this->companyTransferMock));
    }

    /**
     * @return void
     */
    public function testFindCompanyById(): void
    {
        $this->companyRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyById')
            ->willReturn($this->companyTransferMock);

        $this->companyPluginExecutorInterfaceMock->expects($this->atLeastOnce())
            ->method('executeCompanyHydrationPlugins')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->companyReader->findCompanyById($this->idCompany));
    }

    /**
     * @return void
     */
    public function testFindCompanyByIdCompanyTransferNull(): void
    {
        $this->companyRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyById')
            ->willReturn(null);

        $this->assertNull($this->companyReader->findCompanyById($this->idCompany));
    }

    /**
     * @return void
     */
    public function testGetCompanyById(): void
    {
        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getIdCompany')
            ->willReturn($this->idCompany);

        $this->companyRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getCompanyById')
            ->willReturn($this->companyTransferMock);

        $this->companyPluginExecutorInterfaceMock->expects($this->atLeastOnce())
            ->method('executeCompanyHydrationPlugins')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyTransfer::class, $this->companyReader->getCompanyById($this->companyTransferMock));
    }

    /**
     * @return void
     */
    public function testGetCompanies(): void
    {
        $this->companyRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getCompanies')
            ->willReturn($this->companyCollectionTransferMock);

        $this->companyCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getCompanies')
            ->willReturn($this->companyTransferMocks);

        $this->companyPluginExecutorInterfaceMock->expects($this->atLeastOnce())
            ->method('executeCompanyHydrationPlugins')
            ->willReturn($this->companyTransferMock);

        $this->assertInstanceOf(CompanyCollectionTransfer::class, $this->companyReader->getCompanies());
    }
}
