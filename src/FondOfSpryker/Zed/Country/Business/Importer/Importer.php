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
     * @var \Spryker\Zed\Country\Business\CountryManagerInterface $countryManager
     */
    protected $countryManager;

    /**
     * @var \Spryker\Zed\Country\Business\RegionManagerInterface $regionManager
     */
    protected $regionManager;

    /**
     * Importer constructor.
     *
     * @param \Spryker\Zed\Country\Business\CountryManagerInterface $countryManager
     * @param \Spryker\Zed\Country\Business\RegionManagerInterface $regionManager
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
    public function importRegions()
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
