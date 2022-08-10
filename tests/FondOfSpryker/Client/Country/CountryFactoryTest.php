<?php

namespace FondOfSpryker\Client\Country;

use Codeception\Test\Unit;
use FondOfSpryker\Client\Country\Zed\CountryStub;
use Spryker\Client\Country\CountryDependencyProvider;
use Spryker\Client\Country\Dependency\Client\CountryToZedRequestClientInterface;
use Spryker\Client\Kernel\Container;

class CountryFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\Country\CountryFactory
     */
    protected $countryFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Country\Dependency\Client\CountryToZedRequestClientInterface
     */
    protected $zedRequestClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->zedRequestClientInterfaceMock = $this->getMockBuilder(CountryToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryFactory = new CountryFactory();
        $this->countryFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCountryStub(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CountryDependencyProvider::CLIENT_ZED_REQUEST)
            ->willReturn($this->zedRequestClientInterfaceMock);

        $this->assertInstanceOf(
            CountryStub::class,
            $this->countryFactory->createCountryStub(),
        );
    }
}
