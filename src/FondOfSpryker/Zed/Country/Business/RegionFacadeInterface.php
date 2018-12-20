<?php

namespace FondOfSpryker\Zed\Country\Business;

interface RegionFacadeInterface
{
    public function findRegionsByIdCountry(int $idCountry);
}
