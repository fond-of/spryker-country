<?php

namespace FondOfSpryker\Zed\Country\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Country\Business\Importer\Importer;
use FondOfSpryker\Zed\Country\CountryConfig;
use FondOfSpryker\Zed\Country\Persistence\CountryQueryContainer;

class CountryBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Country\Business\CountryBusinessFactory
     */
    protected $countryBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\Persistence\CountryQueryContainer
     */
    protected $countryQueryContainerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\CountryConfig
     */
    protected $countryConfigMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->countryQueryContainerMock = $this->getMockBuilder(CountryQueryContainer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryConfigMock = $this->getMockBuilder(CountryConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryBusinessFactory = new CountryBusinessFactory();
        $this->countryBusinessFactory->setQueryContainer($this->countryQueryContainerMock);
        $this->countryBusinessFactory->setConfig($this->countryConfigMock);
    }

    /**
     * @return void
     */
    public function testCreateImporter(): void
    {
        $this->assertInstanceOf(
            Importer::class,
            $this->countryBusinessFactory->createImporter(),
        );
    }
}
