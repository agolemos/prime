<?php

echo form_open('crud/create');
echo validation_errors('<p>'.'</p>');
if($this->session->flashdata('cadastro')){
    echo '<p>'.$this->session->flashdata('cadastro').'</p>';
}

echo form_label('Digite nome: ');
echo form_input(array('name'=>'nome'),set_value('nome'), 'autofocus');

echo form_label('Digite email: ');
echo form_input(array('name'=>'email'),set_value('email'));

echo form_label('Digite Login: ');
echo form_input(array('name'=>'login'),set_value('login'));

echo form_label('Digite Senha: ');
echo form_password(array('name'=>'senha'),set_value('senha'));

echo form_label('Repita Senha: ');
echo form_password(array('name'=>'senha2'),set_value('senha2'));

echo form_submit(array('name'=>'cadastrar'),'Cadastrar');
echo form_close();

