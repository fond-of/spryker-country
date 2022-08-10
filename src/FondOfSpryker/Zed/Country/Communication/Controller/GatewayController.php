<?php

namespace FondOfSpryker\Zed\Country\Communication\Controller;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Zed\Country\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method \FondOfSpryker\Zed\Country\Business\CountryFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\Country\Persistence\CountryRepositoryInterface getRepository()
 * @method \Spryker\Zed\Country\Communication\CountryCommunicationFactory getFactory()
 */
class GatewayController extends SprykerGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findRegionsByIsoCodeAction(CountryTransfer $countryTransfer): CountryTransfer
    {
        return $this->getFacade()->getCountryByIso2Code($countryTransfer->getIso2Code());
    }

    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findCountryByIso2CodeAction(CountryTransfer $countryTransfer): CountryTransfer
    {
        return $this->getFacade()->getCountryByIso2Code($countryTransfer->getIso2Code());
    }
}
