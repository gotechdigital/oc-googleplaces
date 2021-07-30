<?php namespace GoTech\GooglePlaces\Components;

use Cms\Classes\ComponentBase;

/**
 * GooglePlacesField Component
 */
class GooglePlacesField extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'GooglePlacesField',
            'description' => 'Google Places Field'
        ];
    }

    public function onRun(){
        $key = $this->property('api_key');
        $fields = $this->property('fields');

        $scripts = "";

        $scripts .= "<script>";
        
        foreach($fields as $field) {
            $scripts .= "let {$field};";
        }

        $scripts .= "function initAutocomplete() {";
        
        foreach ($fields as $field) {
            $scripts .= "
                {$field} = new google.maps.places.Autocomplete(
                    document.getElementById('{$field}'), {componentRestrictions: { 'country': ['us'] },
                    fields: ['place_id', 'geometry', 'name']
                });
            ";
        }
        
        $scripts .="}";
        $scripts .= "</script>";

        $scripts .= "<script async src='https://maps.googleapis.com/maps/api/js?key={$key}&libraries=places&callback=initAutocomplete'></script>";

        \Block::append('scripts', $scripts);
    }
    public function defineProperties()
    {
        return [];
    }
}
