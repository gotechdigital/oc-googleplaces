<?php namespace GoTech\GooglePlaces;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'GoTech\GooglePlaces\Components\GooglePlacesField' => 'GooglePlacesField'
        ];
    }

    public function registerSettings()
    {
    }
}
