<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * class Not Found Page 404
 * Created by Lut Dinar Fadila 2018
*/

class NotFoundPage extends CI_Controller
{
    
    public function index()
    {
        $data['title'] = '404 NOT FOUND';
        $this->load->view('notFoundPage', $data);
    }

}
