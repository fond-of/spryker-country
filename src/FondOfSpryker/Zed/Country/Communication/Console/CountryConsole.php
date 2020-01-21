<?php

namespace FondOfSpryker\Zed\Country\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \FondOfSpryker\Zed\Country\Business\CountryFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\Country\Persistence\CountryQueryContainerInterface getQueryContainer()
 */
class CountryConsole extends Console
{
    private const COMMAND_NAME = 'country:region:import';
    private const DESCRIPTION = 'Imports the Regions for the Countries';

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName(static::COMMAND_NAME);
        $this->setDescription(static::DESCRIPTION);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $this->getFacade()->importRegions();

        $output->writeln('Regions have been imported');

        return static::CODE_SUCCESS;
    }
}
