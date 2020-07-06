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
     * @dataProvider textPlProvider
     *
     * @param string $vulgarText
     * @param string $censoredText
     * @return void
     */
    public function testCensor_VulgarText_ReturnsCensoredText(string $vulgarText, string $censoredText): void
    {
        $this->assertSame(
            $censoredText,
            $this->_PleaseDontSwear->censor($vulgarText)
        );
    }

    public function textPlProvider(): array
    {
        return [
            ["kurwa", "*****"],
            ["o ja pierdole", "o ja ********"]
        ];
    }
}
