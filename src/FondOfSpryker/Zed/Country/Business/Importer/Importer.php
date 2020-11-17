<?php

namespace FondOfSpryker\Zed\Country\Business\Importer;

use FondOfSpryker\Zed\Country\CountryConfig;
use Spryker\Zed\Country\Business\CountryManagerInterface;
use Spryker\Zed\Country\Business\RegionManagerInterface;

class Importer implements ImporterInterface
{
    /**
     * @var \FondOfSpryker\Zed\Country\CountryConfig $config
     */
    protected $config;

    /**
     * @var \FondOfSpryker\Zed\Country\Business\CountryManagerInterface $countryManager
     */
    protected $countryManager;

    /**
     * @var \FondOfSpryker\Zed\Country\Business\RegionManagerInterface $regionManager
     */
    protected $regionManager;

    /**
     * @param \FondOfSpryker\Zed\Country\Business\CountryManagerInterface $countryManager
     * @param \FondOfSpryker\Zed\Country\Business\RegionManagerInterface $regionManager
     * @param \FondOfSpryker\Zed\Country\CountryConfig $config
     */
    public function __construct(
        CountryManagerInterface $countryManager,
        RegionManagerInterface $regionManager,
        CountryConfig $config
    ) {
        $this->countryManager = $countryManager;
        $this->regionManager = $regionManager;
        $this->config = $config;
    }

    /**
     * @return void
     */
    public function importRegions(): void
    {
        foreach ($this->config->getRegionInstallerCollection() as $regionInstaller) {
            $fkCountry = $this->countryManager->getIdCountryByIso2Code($regionInstaller->getCountryIso());

            foreach ($regionInstaller->getCodeArray() as $isoCode => $regionName) {
                if (!$this->regionManager->hasRegion($isoCode)) {
                    $this->regionManager->createRegion($isoCode, $fkCountry, $regionName);
                }
            }
        }
    }
}
