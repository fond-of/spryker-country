<?php

namespace FondOfSpryker\Zed\Country\Business;

use Generated\Shared\Transfer\CountryCollectionTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Spryker\Zed\Country\Business\CountryFacade as SprykerCountryFacade;

/**
 * @method \Spryker\Zed\Country\Business\CountryBusinessFactory getFactory()
 */
class CountryFacade extends SprykerCountryFacade implements CountryFacadeInterface
{
    public function findRegionsByIdCountry(int $idCountry)
    {
        return $this->getFactory()
            ->createRegionReader()
            ->findRegionsByIdCountry($idCountry);
    }
}
