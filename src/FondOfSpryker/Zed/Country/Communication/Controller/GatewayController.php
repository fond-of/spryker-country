<?php

namespace FondOfSpryker\Zed\Country\Communication\Controller;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\Country\Business\CountryFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
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
