<?php

namespace FondOfSpryker\Client\Country\Zed;

use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class CountryStub implements CountryStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CountryTransfer $countryTransfer
     *
     * @return \Generated\Shared\Transfer\CountryTransfer
     */
    public function findRegionsByIsoCodeAction(CountryTransfer $countryTransfer): CountryTransfer
    {
        /** @var \Generated\Shared\Transfer\CountryTransfer $countryTransfer */
        $countryTransfer = $this->zedRequestClient->call('/country/gateway/find-regions-by-iso-code', $countryTransfer);

        return $countryTransfer;
    }
}
