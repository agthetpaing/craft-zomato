<?php
/**
 * fetchzomato module for Craft CMS 3.x
 *
 * Fetch JSON data from Zomato API
 *
 * @link      https://github.com/agthetpaing
 * @copyright Copyright (c) 2020 Aung
 */

namespace modules\fetchzomatomodule\assetbundles\fetchzomatomodule;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Aung
 * @package   FetchzomatoModule
 * @since     1
 */
class FetchzomatoModuleAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@modules/fetchzomatomodule/assetbundles/fetchzomatomodule/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/FetchzomatoModule.js',
        ];

        $this->css = [
            'css/FetchzomatoModule.css',
        ];

        parent::init();
    }
}
