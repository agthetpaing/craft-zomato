# fetchzomato module for Craft CMS 3.x

Fetch JSON data from Zomato API

## Requirements

This module requires Craft CMS 3.0.0-RC1 or later.

## Installation

To install the module, follow these instructions.

First, you'll need to add the contents of the `app.php` file to your `config/app.php` (or just copy it there if it does not exist). This ensures that your module will get loaded for each request. The file might look something like this:
```
return [
    'modules' => [
        'fetchzomato-module' => [
            'class' => \modules\fetchzomatomodule\FetchzomatoModule::class,
        ],
    ],
    'bootstrap' => ['fetchzomato-module'],
];
```
You'll also need to make sure that you add the following to your project's `composer.json` file so that Composer can find your module:

    "autoload": {
        "psr-4": {
          "modules\\fetchzomatomodule\\": "modules/fetchzomatomodule/src/"
        }
    },

After you have added this, you will need to do:

    composer dump-autoload
 
 …from the project’s root directory, to rebuild the Composer autoload map. This will happen automatically any time you do a `composer install` or `composer update` as well.

## fetchzomato Overview

-Insert text here-

## Using fetchzomato

-Insert text here-

## fetchzomato Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [Aung](https://github.com/agthetpaing)
