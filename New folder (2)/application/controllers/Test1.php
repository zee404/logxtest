<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Test1
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Test1 extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
   $this->load->view('testview');
  }

}


/* End of file Test1.php */
/* Location: ./application/controllers/Test1.php */