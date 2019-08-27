<?php

namespace FondOfSpryker\Zed\Country\Business;

use FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface;
use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\RegionTransfer;
use Spryker\Zed\Country\Business\CountryManager as SprykerCountryManager;
use Spryker\Zed\Country\Business\Exception\MissingCountryException;

class CountryManager extends SprykerCountryManager implements CountryManagerInterface
{
    /**
     * @var \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface
     */
    protected $countryQueryContainer;

    /**
     * @param \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface $countryQueryContainer
     */
    public function __construct(CountryQueryContainerInterface $countryQueryContainer)
    {
        parent::__construct($countryQueryContainer);
    }

    /**
     * @param string $iso2code
     *
     * @throws
     * @throws \Spryker\Zed\Country\Business\Exception\MissingCountryException
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIso2Code($iso2code): CountryTransfer
    {
        $query = $this->countryQueryContainer->queryCountryByIso2Code($iso2code);
        $countryEntity = $query->findOne();

        if (!$countryEntity) {
            throw new MissingCountryException(sprintf('Country not found for country code: %s', $iso2code));
        }

        $countryTransfer = (new CountryTransfer())->fromArray($countryEntity->toArray(), true);

        foreach ($countryEntity->getSpyRegions() as $region) {
            $countryTransfer->addRegion((new RegionTransfer())->fromArray($region->toArray(), true));
        }

        return $countryTransfer;
    }

    /**
     * @param int $idCountry
     *
     * @throws
     * @throws \Spryker\Zed\Country\Business\Exception\MissingCountryException
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function getCountryByIdCountry(int $idCountry): CountryTransfer
    {
        $query = $this->countryQueryContainer->queryCountryByIdCountry($idCountry);

        $countryEntity = $query->findOne();

        if (!$countryEntity) {
            throw new MissingCountryException(sprintf('Country not found for country id: %s', $idCountry));
        }

        $countryTransfer = (new CountryTransfer())->fromArray($countryEntity->toArray(), true);

        foreach ($countryEntity->getSpyRegions() as $region) {
            $countryTransfer->addRegion((new RegionTransfer())->fromArray($region->toArray(), true));
        }

        return $countryTransfer;
    }
}
