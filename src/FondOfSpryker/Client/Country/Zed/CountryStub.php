<?php

namespace FondOfSpryker\Client\Country\Zed;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;

class CountryStub extends ZedRequestStub implements CountryStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findRegionsByIsoCodeAction(CountryTransfer $countryTransfer): CountryTransfer
    {
        return $this->zedStub->call('/country/gateway/find-regions-by-iso-code', $countryTransfer);
    }
}
