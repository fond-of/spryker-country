<?php

namespace FondOfSpryker\Client\Country\Zed;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CountryTransfer;
use Spryker\Client\Country\Dependency\Client\CountryToZedRequestClientInterface;

class CountryStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\Country\Zed\CountryStub
     */
    protected $countryStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Country\Dependency\Client\CountryToZedRequestClientInterface
     */
    protected $zedRequestClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CountryTransfer
     */
    protected $countryTransferMock;

    /**
     * @var string
     */
    protected $actionUrl;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->zedRequestClientInterfaceMock = $this->getMockBuilder(CountryToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryTransferMock = $this->getMockBuilder(CountryTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->actionUrl = '/country/gateway/find-regions-by-iso-code';

        $this->url = '/country/gateway/find-country-by-iso2-code';

        $this->countryStub = new CountryStub($this->zedRequestClientInterfaceMock);
    }

    /**
     * @return void
     */
    public function testFindRegionsByIsoCodeAction(): void
    {
        $this->zedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->actionUrl, $this->countryTransferMock)
            ->willReturn($this->countryTransferMock);

        $this->assertInstanceOf(
            CountryTransfer::class,
            $this->countryStub->findRegionsByIsoCodeAction(
                $this->countryTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCountryByIso2Code(): void
    {
        $this->zedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->url, $this->countryTransferMock)
            ->willReturn($this->countryTransferMock);

        $this->assertInstanceOf(
            CountryTransfer::class,
            $this->countryStub->findCountryByIso2Code(
                $this->countryTransferMock
            )
        );
    }
}
