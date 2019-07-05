<?php
/**
* Function Name: getLatLong()
* $address => Full address.
* Return => Latitude and longitude of the given address.
**/
function getLocationGoogleMap($address, $apikey){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false&key='.$apikey);
        $output = json_decode($geocodeFromAddr);
        //Get full address from json data
        $data['address'] = $output->results[0]->formatted_address;
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Get Name location from json data
        $data['location_name'] = $output->results[0]->address_components[0]->long_name;
        //Get location from json data
        $data['house_number'] = $output->results[0]->address_components[1]->long_name;
        $data['strees_name'] = $output->results[0]->address_components[2]->long_name;
        $data['county'] = $output->results[0]->address_components[3]->long_name;
        $data['provincial'] = $output->results[0]->address_components[4]->long_name;
        $data['national'] = $output->results[0]->address_components[5]->long_name;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;  
    }
}
?>