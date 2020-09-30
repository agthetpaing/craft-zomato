<?php
/**
 * fetchzomato module for Craft CMS 3.x
 *
 * Fetch JSON data from Zomato API
 *
 * @link      https://github.com/agthetpaing
 * @copyright Copyright (c) 2020 Aung
 */

namespace modules\fetchzomatomodule\twigextensions;

use modules\fetchzomatomodule\FetchzomatoModule;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author    Aung
 * @package   FetchzomatoModule
 * @since     1
 */
class FetchzomatoModuleTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'FetchzomatoModule';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new TwigFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('someFunction', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function someInternalFunction($text = null)
    {
        $result = $text . " in the way";

        return $result;
    }
}
