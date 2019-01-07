<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GMAPS_GEOCACHE extends Model
{
    //

     function get_coordinates()    {
        $return = array();
        $this->db->select("lat,lng,address"); 
               $this->axios->from("gmaps_geocache"); 
                   $query = $this->axios->get();
        if ($query->num_rows()>0) { 
          foreach ($query->result() as $row) {   
           array_push($return, $row);          
             }
           }
        return $return;
    }
}
