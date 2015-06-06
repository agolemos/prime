<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    
    public function __construct(){
        
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->load->library('session');
               
    }
    
    
    public function index()
    {
        
        $dados = array(
             'titulo1' => 'Crud com CodeIgniter',
             'tela' => '', 
        );
        $this->load->view('crud', $dados);
    }
    
    public function create()
    {
        //validação do form
        
        $this->form_validation->set_rules('nome','NOME','trim|required|alpha|max_length[50]|ucwords');
        $this->form_validation->set_rules('email','EMAIL','trim|required|max_length[50]|strtolower|valid_email|is_unique[curso_ci.email]');
        $this->form_validation->set_rules('login','LOGIN','trim|required|max_length[25]|strtolower|is_unique[curso_ci.login]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|ucwords|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA SENHA','trim|required|ucwords|strtolower|matches[senha]');
        if($this->form_validation->run()==TRUE):
             $dados= elements(array('nome','email','login','senha'),$this->input->post());
             $dados['senha']=md5($dados['senha']);
             $this->load->model('crud_model');
             $this->crud_model->do_insert($dados);
         endif;
        
        $dados = array(
             'titulo' => 'Crud &raquo; Create',
             'tela' => 'create', 
        );
        $this->load->view('crud', $dados);
    }
    
    public function retrieve()
    {
        $this->load->helper('url');
        $dados = array(
             'titulo' => 'Crud &raquo; Retrieve',
             'tela' => 'retrieve', 
        );
        $this->load->view('crud', $dados);
    }
    
    public function update()
    {
        $this->load->helper('url');
        $dados = array(
             'titulo' => 'Crud &raquo; Update',
             'tela' => 'update', 
        );
        $this->load->view('crud', $dados);
    }
    
    public function delete()
    {
        $this->load->helper('url');
        $dados = array(
             'titulo' => 'Crud &raquo; Delete',
             'tela' => 'delete', 
        );
        $this->load->view('crud', $dados);
    }
}
