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
        $field = $this->property('field', 'address-autocomplete');

        $scripts = "";
        $scripts .= "<script>
            
            let autocomplete;

            function initAutocomplete() {
                autocomplete = new google.maps.places.Autocomplete(
                    document.getElementById('{$field}'), {
                    //types: ['establishment'],
                    componentRestrictions: { 'country': ['us'] },
                    fields: ['place_id', 'geometry', 'name']
                });
            }
            </script>";


        $scripts .= "<script async src='https://maps.googleapis.com/maps/api/js?key={$key}&libraries=places&callback=initAutocomplete'></script>";

        \Block::append('scripts', $scripts);
    }
    public function defineProperties()
    {
        return [];
    }
}
