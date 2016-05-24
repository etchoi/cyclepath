<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Model {
    function create_image($link) {
        $query = "INSERT INTO images (link, created_on, updated_on) VALUES (?, NOW(), NOW())";
        $values = array($link);
        $this->db->query($query, $values);
        return $this->db->insert_id();
    }

}