<?php

namespace FondOfSpryker\Zed\Country\Business\Importer;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Country\Business\RegionManagerInterface;
use FondOfSpryker\Zed\Country\CountryConfig;
use Spryker\Zed\Country\Business\CountryManagerInterface;
use Spryker\Zed\Country\Business\Internal\Regions\RegionInstallInterface;

class ImporterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\Country\Business\Importer\Importer
     */
    protected $importer;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Country\Business\CountryManagerInterface
     */
    protected $countryManagerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\Business\RegionManagerInterface
     */
    protected $regionManagerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Country\CountryConfig
     */
    protected $countryConfigMock;

    /**
     * @var array<\Spryker\Zed\Country\Business\Internal\Regions\RegionInstallInterface>
     */
    protected $regionInstallerCollection;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Country\Business\Internal\Regions\RegionInstallInterface
     */
    protected $regionInstallInterfaceMock;

    /**
     * @var string
     */
    protected $countryIso;

    /**
     * @var int
     */
    protected $idCountry;

    /**
     * @var array
     */
    protected $codeArray;

    /**
     * @var string
     */
    protected $regionName;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->countryManagerInterfaceMock = $this->getMockBuilder(CountryManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->regionManagerInterfaceMock = $this->getMockBuilder(RegionManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryConfigMock = $this->getMockBuilder(CountryConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->regionInstallInterfaceMock = $this->getMockBuilder(RegionInstallInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->regionInstallerCollection = [
            $this->regionInstallInterfaceMock,
        ];

        $this->countryIso = 'country-iso';

        $this->idCountry = 1;

        $this->regionName = 'region-name';

        $this->codeArray = [
            $this->countryIso => $this->regionName,
        ];

        $this->importer = new Importer(
            $this->countryManagerInterfaceMock,
            $this->regionManagerInterfaceMock,
            $this->countryConfigMock,
        );
    }

    /**
     * @return void
     */
    public function testImportRegions(): void
    {
        $this->countryConfigMock->expects($this->atLeastOnce())
            ->method('getRegionInstallerCollection')
            ->willReturn($this->regionInstallerCollection);

        $this->regionInstallInterfaceMock->expects($this->atLeastOnce())
            ->method('getCountryIso')
            ->willReturn($this->countryIso);

        $this->countryManagerInterfaceMock->expects($this->atLeastOnce())
            ->method('getIdCountryByIso2Code')
            ->with($this->countryIso)
            ->willReturn($this->idCountry);

        $this->regionInstallInterfaceMock->expects($this->atLeastOnce())
            ->method('getCodeArray')
            ->willReturn($this->codeArray);

        $this->regionManagerInterfaceMock->expects($this->atLeastOnce())
            ->method('hasRegion')
            ->with($this->countryIso)
            ->willReturn(false);

        $this->regionManagerInterfaceMock->expects($this->atLeastOnce())
            ->method('createRegion')
            ->with($this->countryIso, $this->idCountry, $this->regionName)
            ->willReturn($this->idCountry);

        $this->importer->importRegions();
    }
}
