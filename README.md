# Fond Of Spryker Country
[![Build Status](https://travis-ci.org/fond-of/spryker-country.svg?branch=master)](https://travis-ci.org/fond-of/spryker-country)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/country)

Extends the Spryker Country Extension
   * Implement Console Command to import regions for the countries

Important: The Module is still in Implementation Phase

## Installation

```
composer require fond-of-spryker/country
```

## 1. Register Console Command in  Pyz\Zed\Console

```
 new CountryConsole(),

```

## 2. Add Region Installers in Pyz\Zed\Country\CountryConfig

```
  return [
             new GermanyRegionInstaller(),
             new UnitedStatesRegionInstaller(),
         ];

```

## Optional

If needed countries in EU in template register CountriesInEuTwigPlug in TwigDependencyProvider
```
protected function getTwigPlugins(): array
    {
        return [
            ...
            new CountriesInEuTwigPlugin(),
        ];
    }
```
Use in template
```
<script type="text/javascript">
    var countriesInEU = {{ countries_in_eu | json_encode | raw }};
</script>
```

## Changelog
20200311 - moved the stuff from the old deprecated ShopApplicationServiceProvider addGlobalTemplateVariables to the twig CountriesInEuTwigPlugin
