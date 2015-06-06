<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_model{
    
    public function do_insert($dados=NULL){
        
        if($dados!=NULL){
            $this->db->insert('curso_ci',$dados);
            
            $this->session->set_flashdata('cadastro','Cadastro efetuado com sucesso');
            redirect('crud/create');
        }
        
    }
}
