<?php

namespace FondOfSpryker\Zed\Company;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class CompanyDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Company\CompanyDependencyProvider
     */
    protected $companyDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyDependencyProvider = new CompanyDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(Container::class, $this->companyDependencyProvider->provideBusinessLayerDependencies($this->containerMock));
    }
}
