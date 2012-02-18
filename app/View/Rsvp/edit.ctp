<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    echo $this->Form->create('Invite');
    $num_a = rand(1,10);
    $num_b = rand(1,10);
    $md5 = md5(($num_a + $num_b)."");

?>

<h3>Hello, <?php echo $invite['Invite']['name'] ?>!</h3>
<?php
    if(empty($invite['Invite']['name'])){
        echo $this->Form->input('name');
    }else{
        echo $this->Form->input('name', array('type'=>'hidden'));
    }
?>
<?php echo $this->Form->input('id', array('type'=>'hidden')); ?>
<?php echo $this->Form->input('uid', array('type'=>'hidden')); ?>
<?php echo $this->Form->input('confirmed', array('type'=>'hidden', 'value'=>true)); ?>
<?php echo $this->Form->input('num_people',array('label'=>'How many people will you be bringing?')); ?>
<?php echo $this->Form->input('email',array('label'=>'What is your email address?')); ?>
<?php echo $this->Form->input('user_comments',array('label'=>'Anything you would like to share?')); ?>
<p> If you entered your email address, you should get an email confirmation </p>
<?php echo $this->Form->input("test",array('label'=>"What is $num_a + $num_b? (Prove you are human please)"));?>
<?php echo $this->Form->input('test_hash',array('type'=>'hidden','value'=>$md5)); ?>
<?php echo $this->Form->submit('RSVP!'); ?>

