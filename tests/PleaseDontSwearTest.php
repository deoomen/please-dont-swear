<?php

use PHPUnit\Framework\TestCase;
use PleaseDontSwear\PleaseDontSwear;

class PleaseDontSwearTest extends TestCase
{
    private $_PleaseDontSwear;

    public function setUp(): void
    {
        $this->_PleaseDontSwear = new PleaseDontSwear();
    }

    public function tearDown(): void
    {
        $this->_PleaseDontSwear = null;
    }

    /**
     * @test
     *
     * @return void
     */
    public function canBeCreated(): void
    {
        $this->assertInstanceOf(
            PleaseDontSwear::class,
            $this->_PleaseDontSwear
        );
    }

    /**
     * @test
     */
    public function test_nothing_ReturnsString(): void
    {
        $this->assertSame('PleaseDontSwear->test', $this->_PleaseDontSwear->test());
    }
}
