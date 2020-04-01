<?php

namespace FondOfSpryker\Zed\Company\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Company\Business\Reader\CompanyReaderInterface;
use FondOfSpryker\Zed\Company\CompanyDependencyProvider;
use FondOfSpryker\Zed\Company\Persistence\CompanyRepository;
use Spryker\Zed\Kernel\Container;

class CompanyBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Company\Business\CompanyBusinessFactory
     */
    protected $companyBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Company\Persistence\CompanyRepository
     */
    protected $companyRepositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var array
     */
    protected $companyPreSavePlugins;

    /**
     * @var array
     */
    protected $companyPostSavePlugins;

    /**
     * @var array
     */
    protected $companyPostCreatePlugins;

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

        $this->companyRepositoryMock = $this->getMockBuilder(CompanyRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyPreSavePlugins = [];

        $this->companyPostSavePlugins = [];

        $this->companyPostCreatePlugins = [];

        $this->companyHydrationPlugins = [];

        $this->companyBusinessFactory = new CompanyBusinessFactory();
        $this->companyBusinessFactory->setContainer($this->containerMock);
        $this->companyBusinessFactory->setRepository($this->companyRepositoryMock);
    }

    /**
     * @return void
     */
    public function testCreateCompanyReader(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->withConsecutive(
                [CompanyDependencyProvider::COMPANY_PRE_SAVE_PLUGINS],
                [CompanyDependencyProvider::COMPANY_POST_SAVE_PLUGINS],
                [CompanyDependencyProvider::COMPANY_POST_CREATE_PLUGINS],
                [CompanyDependencyProvider::PLUGINS_COMPANY_HYDRATE]
            )->willReturnOnConsecutiveCalls(
                $this->companyPreSavePlugins,
                $this->companyPostSavePlugins,
                $this->companyPostCreatePlugins,
                $this->companyHydrationPlugins
            );

        $this->assertInstanceOf(CompanyReaderInterface::class, $this->companyBusinessFactory->createCompanyReader());
    }
}
