<?php
/**
 * PleaseDontSwear package main file.
 * PHP Version: 7.4.
 *
 * @package PleaseDontSwear
 * @author  deoomen <deoomen@protonmail.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @link    https://github.com/deoomen/please-dont-swear
 */

namespace PleaseDontSwear;

/**
 * PleaseDontSwear main class.
 *
 * @version Release: 1.0.0
 */
class PleaseDontSwear
{
    /**
     * Array of swears.
     */
    private array $_swears;

    /**
     * Initially loads dictionary.
     */
    public function __construct()
    {
        $this->_swears = \json_decode(
            \file_get_contents(__DIR__ . '/swears-pl.json')
        );
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
        foreach ($this->_swears as $swear) {
            if (\preg_match("/\b{$swear}\b/i", $text) === 1) {
                return true;
            }
        }

        return false;
    }
}
