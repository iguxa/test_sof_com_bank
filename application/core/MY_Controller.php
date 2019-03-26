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

    public function __construct()
    {
        parent::__construct();
        $this->blade = new PhpBlade($this->views,$this->cache);
    }
    public function render(string $path,array $params = [])
    {
        echo $this->blade->view()->make($path,$params);
    }


}