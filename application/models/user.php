<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
   class user extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function getUser()
    {

        //$this->load->database();
        $query = $this->db->query('select * from web_admin_user limit 10');
        return $query->result();
    }

   

}

?>
