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

