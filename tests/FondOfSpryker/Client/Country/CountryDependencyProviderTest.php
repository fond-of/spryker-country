<?php

namespace FondOfSpryker\Client\Country;

use Codeception\Test\Unit;
use Spryker\Client\Kernel\Container;

class CountryDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\Country\CountryDependencyProvider
     */
    protected $countryDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryDependencyProvider = new CountryDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideServiceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->countryDependencyProvider->provideServiceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
