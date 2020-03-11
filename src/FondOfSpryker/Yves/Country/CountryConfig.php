<?php

namespace FondOfSpryker\Yves\Country;

use FondOfSpryker\Shared\Country\CountryConstants;
use Spryker\Yves\Kernel\AbstractBundleConfig;

class CountryConfig extends AbstractBundleConfig
{
    public function getCountriesInEu(): array
    {
        return $this->get(CountryConstants::COUNTRIES_IN_EU, [
            'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GB', 'GR', 'HR',
            'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PL', 'PT', 'RO', 'SE', 'SI', 'SK',
        ]);
    }
}
