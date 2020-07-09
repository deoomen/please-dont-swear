<?php
/**
 * PleaseDontSwear unit tests
 * PHP Version: 7.4
 *
 * @category Description
 * @package  PleaseDontSwear
 * @author   deoomen <deoomen@protonmail.com>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/deoomen/please-dont-swear
 */

use PHPUnit\Framework\TestCase;
use PleaseDontSwear\PleaseDontSwear;

/**
 * PleaseDontSwear unit tests class
 */
class PleaseDontSwearTest extends TestCase
{
    private $_PleaseDontSwear;

    /**
     * Initialize class
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->_PleaseDontSwear = new PleaseDontSwear();
    }

    /**
     * Destroy class
     *
     * @return void
     */
    public function tearDown(): void
    {
        $this->_PleaseDontSwear = null;
    }

    /**
     * Test construct
     *
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
     * Test censor method
     *
     * @param string $vulgarText   text to censor
     * @param string $censoredText cenzored text
     *
     * @dataProvider textPlProvider
     *
     * @return void
     */
    public function testCensorVulgarTextReturnsCensoredText(string $vulgarText, string $censoredText): void
    {
        $this->assertSame(
            $censoredText,
            $this->_PleaseDontSwear->censor($vulgarText)
        );
    }

    /**
     * Test cases for pl
     *
     * @return array
     */
    public function textPlProvider(): array
    {
        return [
            ["kurwa", "*****"],
            ["o ja pierdole", "o ja ********"],
            ["chuj z tym", "**** z tym"],
            ["kurwa ja jebie, chuj z tym, pierdole", "***** ja *****, **** z tym, ********"],
            ["", ""],
            ["dobre słówka", "dobre słówka"],
            ["dobra KurWA", "dobra *****"]
        ];
    }
}
