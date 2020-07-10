<?php
/**
 * PleaseDontSwear package main file
 * PHP Version: 7.4
 *
 * @package PleaseDontSwear
 * @author  deoomen <deoomen@protonmail.com>
 * @license https://opensource.org/licenses/MIT MIT
 * @link    https://github.com/deoomen/please-dont-swear
 */

namespace PleaseDontSwear;

/**
 * PleaseDontSwear main class
 *
 * @version Release: 1.0.0
 */
class PleaseDontSwear
{
    /**
     * Array of swears
     *
     * @var array $_swears
     */
    private array $_swears;

    /**
     * Initially loads dictionary
     */
    public function __construct()
    {
        $this->_swears = \json_decode(
            \file_get_contents(__DIR__ . '/swears-pl.json')
        );
    }

    /**
     * Censor the text by fully masking swears
     *
     * @param string $textToCensor Text you want to be censored
     *
     * @return string
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
}
