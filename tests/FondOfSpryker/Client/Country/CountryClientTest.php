<?php

namespace FondOfSpryker\Client\Country;

use Codeception\Test\Unit;
use FondOfSpryker\Client\Country\Zed\CountryStubInterface;
use Generated\Shared\Transfer\CountryTransfer;

class CountryClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\Country\CountryClient
     */
    protected $countryClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CountryTransfer
     */
    protected $countryTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\Country\CountryFactory
     */
    protected $countryFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\Country\Zed\CountryStubInterface
     */
    protected $countryStubInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->countryFactoryMock = $this->getMockBuilder(CountryFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryTransferMock = $this->getMockBuilder(CountryTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryStubInterfaceMock = $this->getMockBuilder(CountryStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->countryClient = new CountryClient();
        $this->countryClient->setFactory($this->countryFactoryMock);
    }

    /**
     * @return void
     */
    public function testGetRegionsByCountryTransfer(): void
    {
        $this->countryFactoryMock->expects($this->atLeastOnce())
            ->method('createCountryStub')
            ->willReturn($this->countryStubInterfaceMock);

        $this->countryStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findRegionsByIsoCodeAction')
            ->with($this->countryTransferMock)
            ->willReturn($this->countryTransferMock);

        $this->assertInstanceOf(
            CountryTransfer::class,
            $this->countryClient->getRegionsByCountryTransfer(
                $this->countryTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCountryByIso2Code(): void
    {
        $this->countryFactoryMock->expects($this->atLeastOnce())
            ->method('createCountryStub')
            ->willReturn($this->countryStubInterfaceMock);

        $this->countryStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCountryByIso2Code')
            ->with($this->countryTransferMock)
            ->willReturn($this->countryTransferMock);

        $this->assertInstanceOf(
            CountryTransfer::class,
            $this->countryClient->findCountryByIso2Code(
                $this->countryTransferMock
            )
        );
    }
}
