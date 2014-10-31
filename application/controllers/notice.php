<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->lang->load('common');
        $this->load->helper('url');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function index()
	{
	    $data['title']=$this->input->get('title');
		$data['content']=$this->input->get('content');
		$data['rurl']=$this->input->get('rurl');

        
		$this->load->view('notice',$data);
	}
}

/* End of file Notice.php */
/* Location: ./application/controllers/Notice.php */