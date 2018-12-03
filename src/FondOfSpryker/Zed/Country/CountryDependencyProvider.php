<?php

namespace FondOfSpryker\Zed\Country;

use Spryker\Zed\Country\CountryDependencyProvider as SprykerCountryDependenyProvider;
use Spryker\Zed\Kernel\Container;

class CountryDependencyProvider extends SprykerCountryDependenyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        return $container;
    }

}
