<?php

namespace FondOfSpryker\Yves\Country\Plugin\Twig;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\TwigExtension\Dependency\Plugin\TwigPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig\Environment;

/**
 * Class CountriesInEuTwigPlugin
 * @method \FondOfSpryker\Yves\Country\CountryConfig getConfig()
 */
class CountriesInEuTwigPlugin extends AbstractPlugin implements TwigPluginInterface
{
    /**
     * @param \Twig\Environment $twig
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Twig\Environment
     */
    public function extend(Environment $twig, ContainerInterface $container): Environment
    {
        $twig->addGlobal('countries_in_eu', $this->getConfig()->getCountriesInEu());

        return $twig;
    }
}
