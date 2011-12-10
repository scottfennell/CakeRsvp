<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('User',array('action'=>'register'));
echo $this->Form->input('username');
echo $this->Form->input('password');

echo $this->Form->end('Register');

?>
