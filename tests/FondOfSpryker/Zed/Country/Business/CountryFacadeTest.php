<?php

namespace FondOfSpryker\Zed\Country\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Country\Business\Importer\ImporterInterface;
use Generated\Shared\Transfer\CountryTransfer;

class CountryFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Country\Business\CountryFacade
     */
    protected $countryFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\Business\CountryBusinessFactory
     */
    protected $countryBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\Business\Importer\ImporterInterface
     */
    protected $importerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\Business\CountryManagerInterface
     */
    protected $countryManagerInterfaceMock;

    /**
     * @var int
     */
    protected $idCountry;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CountryTransfer
     */
    protected $countryTransferMock;

    /**
     * @var int
     */
    protected $idRegion;

    /**
     * @var string
     */
    protected $iso2Code;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\Business\RegionManagerInterface
     */
    protected $regionManagerInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->countryBusinessFactoryMock = $this->getMockBuilder(CountryBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->importerInterfaceMock = $this->getMockBuilder(ImporterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryManagerInterfaceMock = $this->getMockBuilder(CountryManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCountry = 1;

        $this->countryTransferMock = $this->getMockBuilder(CountryTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idRegion = 2;

        $this->iso2Code = 'iso-2-code';

        $this->regionManagerInterfaceMock = $this->getMockBuilder(RegionManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryFacade = new CountryFacade();
        $this->countryFacade->setFactory($this->countryBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testImportRegions(): void
    {
        $this->countryBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createImporter')
            ->willReturn($this->importerInterfaceMock);

        $this->countryFacade->importRegions();
    }

    /**
     * @return void
     */
    public function testGetCountryByIdCountry(): void
    {
        $this->countryBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCountryManager')
            ->willReturn($this->countryManagerInterfaceMock);

        $this->countryManagerInterfaceMock->expects($this->atLeastOnce())
            ->method('getCountryByIdCountry')
            ->with($this->idCountry)
            ->willReturn($this->countryTransferMock);

        $this->assertInstanceOf(
            CountryTransfer::class,
            $this->countryFacade->getCountryByIdCountry(
                $this->idCountry
            )
        );
    }

    /**
     * @return void
     */
    public function testGetIdRegionByIso2Code(): void
    {
        $this->countryBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createRegionManager')
            ->willReturn($this->regionManagerInterfaceMock);

        $this->regionManagerInterfaceMock->expects($this->atLeastOnce())
            ->method('getIdRegionByIso2Code')
            ->with($this->iso2Code)
            ->willReturn($this->idRegion);

        $this->assertSame(
            $this->idRegion,
            $this->countryFacade->getIdRegionByIso2Code(
                $this->iso2Code
            )
        );
    }
}
