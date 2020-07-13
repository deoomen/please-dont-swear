<?php
/**
 * PleaseDontSwear package main file.
 * PHP Version: 7.4.
 *
 * @package PleaseDontSwear
 * @author  deoomen <deoomen@pm.me>
 * @license https://opensource.org/licenses/MIT MIT
 * @link    https://github.com/deoomen/please-dont-swear
 */

namespace PleaseDontSwear;

/**
 * PleaseDontSwear main class.
 *
 * @version Release: 1.1.0
 */
class PleaseDontSwear
{
    /**
     * Array of swears.
     */
    private array $_swears;

    /**
     * Swears regex pattern.
     */
    private ?string $_swearsPattern;

    /**
     * Initially loads dictionary.
     */
    public function __construct()
    {
        $this->_swears = \json_decode(
            \file_get_contents(__DIR__ . '/swears-pl.json')
        );

        $this->_swearsPattern = null;
    }

    /**
     * Prepare swears regex pattern from array of swears.
     */
    private function _prepareSwearsPattern(): void
    {
        $this->_swearsPattern = '/\b(' . \implode('|', $this->_swears) . '})\b/i';
    }

    /**
     * Censor the text by fully masking swears.
     *
     * @param string $textToCensor Text you want to be censored.
     *
     * @return string Returns censored text.
     */
    public function censor(string $textToCensor): string
    {
        $censoredText = $textToCensor;
        foreach ($this->_swears as $swear) {
            $pattern = "/\b{$swear}\b/i";
            if (\preg_match($pattern, $censoredText) === 1) {
                $censor = '';
                for ($i = 0; $i < \strlen($swear); $i++) {
                    $censor .= '*';
                }

                $censoredText = \preg_replace(
                    $pattern,
                    $censor,
                    $censoredText
                );
            }
        }

        return $censoredText;
    }

    /**
     * Checks if the text contains bad words.
     *
     * @param string $text Text to check if it contains bad words.
     *
     * @return bool Returns `true` if text contain any bad word, otherwise returns `false`.
     */
    public function checkForSwears(string $text): bool
    {
        if ($this->_swearsPattern === null) {
            $this->_prepareSwearsPattern();
        }

        return \preg_match($this->_swearsPattern, $text) === 1;
    }
}
