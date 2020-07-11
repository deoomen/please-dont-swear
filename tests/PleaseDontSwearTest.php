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
     */
    public function setUp(): void
    {
        $this->_PleaseDontSwear = new PleaseDontSwear();
    }

    /**
     * Destroy class
     */
    public function tearDown(): void
    {
        $this->_PleaseDontSwear = null;
    }

    /**
     * Test construct
     *
     * @test
     */
    public function canBeCreated(): void
    {
        $this->assertInstanceOf(
            PleaseDontSwear::class,
            $this->_PleaseDontSwear
        );
    }

    /**
     * Test cases for pl
     */
    public function textPlCensorProvider(): array
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

    /**
     * Test censor method
     *
     * @dataProvider textPlCensorProvider
     */
    public function testCensor_VulgarText_ReturnsCensoredText(string $vulgarText, string $censoredText): void
    {
        $this->assertSame(
            $censoredText,
            $this->_PleaseDontSwear->censor($vulgarText)
        );
    }

    public function textPlForCheckProvider(): array
    {
        return [
            ["kurwa", true],
            ["o ja pierdole", true],
            ["chuj z tym", true],
            ["kurwa ja jebie, chuj z tym, pierdole", true],
            ["", false],
            ["dobre słówka", false],
            ["nie ma tu nic złego", false],
            ["dobra KurWA", true]
        ];
    }

    /**
     * Test checkForSwears method
     *
     * @dataProvider textPlForCheckProvider
     */
    public function testCheckForSwears_Swears_ReturnsTrue(string $textToCheck, bool $textHasSwears): void
    {
        $this->assertSame(
            $textHasSwears,
            $this->_PleaseDontSwear->checkForSwears($textToCheck)
        );
    }
}
