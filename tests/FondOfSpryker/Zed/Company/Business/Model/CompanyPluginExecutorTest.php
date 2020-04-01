<?php

namespace FondOfSpryker\Zed\Company\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyExtension\Dependency\Plugin\CompanyHydrationPluginInterface;
use Generated\Shared\Transfer\CompanyTransfer;

class CompanyPluginExecutorTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Company\Business\Model\CompanyPluginExecutor
     */
    protected $companyPluginExecutor;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyExtension\Dependency\Plugin\CompanyHydrationPluginInterface
     */
    protected $companyHydrationPluginInterfaceMock;

    /**
     * @var array
     */
    protected $companyHydrationPlugins;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyHydrationPluginInterfaceMock = $this->getMockBuilder(CompanyHydrationPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyHydrationPlugins = [
            $this->companyHydrationPluginInterfaceMock,
        ];

        $this->companyPluginExecutor = new CompanyPluginExecutor([], [], [], $this->companyHydrationPlugins);
    }

    /**
     * @return void
     */
    public function testExecuteCompanyHydrationPlugins(): void
    {
        $this->assertInstanceOf(CompanyTransfer::class, $this->companyPluginExecutor->executeCompanyHydrationPlugins($this->companyTransferMock));
    }
}
