<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
    }


    public function index()
    {
        var_dump(HolaMundo());
        var_dump($this->proyecto->realizaAlgo());
        $this->load->view('header');
        $this->load->view('home/index', [
            'data' => [
                ['Nombre' => 'Jesus', 'Apellido' => 'Ferrer'],
                ['Nombre' => 'Ana', 'Apellido' => 'Gonzalez'],
            ]
        ]);
        $this->load->view('footer');
    }

    public function otro($param1, $param2=0)
    {
        var_dump($param1);
        var_dump($param2);
        $this->load->view('header');
        $this->load->view('home/otro');
        $this->load->view('footer');
    }    
}
