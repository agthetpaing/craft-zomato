<?php
/**
 * fetchzomato module for Craft CMS 3.x
 *
 * Fetch JSON data from Zomato API
 *
 * @link      https://github.com/agthetpaing
 * @copyright Copyright (c) 2020 Aung
 */

namespace modules\fetchzomatomodule;

use modules\fetchzomatomodule\assetbundles\fetchzomatomodule\FetchzomatoModuleAsset;
use modules\fetchzomatomodule\twigextensions\FetchzomatoModuleTwigExtension;

use Craft;
use craft\events\RegisterTemplateRootsEvent;
use craft\events\TemplateEvent;
use craft\i18n\PhpMessageSource;
use craft\web\View;

use yii\base\Event;
use yii\base\InvalidConfigException;
use yii\base\Module;

/**
 * Class FetchzomatoModule
 *
 * @author    Aung
 * @package   FetchzomatoModule
 * @since     1
 *
 */
class FetchzomatoModule extends Module
{
    // Static Properties
    // =========================================================================

    /**
     * @var FetchzomatoModule
     */
    public static $instance;

    // Public Methods



    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/fetchzomatomodule', $this->getBasePath());
        $this->controllerNamespace = 'modules\fetchzomatomodule\controllers';

        // Translation category
        $i18n = Craft::$app->getI18n();
        /** @noinspection UnSafeIsSetOverArrayInspection */
        if (!isset($i18n->translations[$id]) && !isset($i18n->translations[$id.'*'])) {
            $i18n->translations[$id] = [
                'class' => PhpMessageSource::class,
                'sourceLanguage' => 'en-US',
                'basePath' => '@modules/fetchzomatomodule/translations',
                'forceTranslation' => true,
                'allowOverrides' => true,
            ];
        }

        // Base template directory
        Event::on(View::class, View::EVENT_REGISTER_CP_TEMPLATE_ROOTS, function (RegisterTemplateRootsEvent $e) {
            if (is_dir($baseDir = $this->getBasePath().DIRECTORY_SEPARATOR.'templates')) {
                $e->roots[$this->id] = $baseDir;
            }
        });

        // Set this as the global instance of this module class
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$instance = $this;

        if (Craft::$app->getRequest()->getIsCpRequest()) {
            Event::on(
                View::class,
                View::EVENT_BEFORE_RENDER_TEMPLATE,
                function (TemplateEvent $event) {
                    try {
                        Craft::$app->getView()->registerAssetBundle(FetchzomatoModuleAsset::class);
                    } catch (InvalidConfigException $e) {
                        Craft::error(
                            'Error registering AssetBundle - '.$e->getMessage(),
                            __METHOD__
                        );
                    }
                }
            );
        }

        Craft::$app->view->registerTwigExtension(new FetchzomatoModuleTwigExtension());

        Craft::info(
            Craft::t(
                'fetchzomato-module',
                '{name} module loaded',
                ['name' => 'fetchzomato']
            ),
            __METHOD__
        );

    }

    // Protected Methods
    // =========================================================================
}
