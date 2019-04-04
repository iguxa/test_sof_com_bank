<?php
/**
 * Created by PhpStorm.
 * User: iguxa
 * Date: 26.03.19
 * Time: 15:15
 */
defined('BASEPATH') OR exit('No direct script access allowed');


use Coolpraz\PhpBlade\PhpBlade;

class MY_Controller extends CI_Controller
{
    protected $views = APPPATH.'views';
    protected $cache = APPPATH.'cache';
    protected $clean_data;

    public function __construct()
    {
        parent::__construct();
        $this->blade = new PhpBlade($this->views,$this->cache);
        $this->load->helper('url');
    }
    protected function render(string $path)
    {
        $params = func_get_args();
        echo $this->blade->view()->make($path,$params[1]);
    }
    protected function setCleanData()
    {
        if(!empty($this->input->input_stream('csrf_test_name',true))){
            $data = $this->input->input_stream();
            unset($data['csrf_test_name']);
            $this->clean_data = $this->security->xss_clean($data);
        }
    }

}