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
<span class="instructions">Enter your information below to confirm you will be 
    joining us, make sure you click "RSVP!" at the bottom to finish. If you will
    not be able to make it, then please enter 0 for the number of people in your
    party.
</span>
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
<?php echo $this->Form->input('num_people',array('label'=>'How many people will you be bringing?','after'=>'<span class="instructions">This is the total number of people you are RSVPing for (including yourself), enter 0 here if you are not going to be able to join us</span>')); ?>
<?php echo $this->Form->input('email',array('label'=>'What is your email address?')); ?>
<?php echo $this->Form->input('user_comments',array('label'=>'Anything you would like to share?','after'=>'<span class="instructions">Questions, concerns, thoughts, what you are planning for your next meal, whatever you want :-)</span>')); ?>
<?php echo $this->Form->input("test",array('label'=>"What is $num_a + $num_b? (Prove you are human please)", 'after'=>'<span class="instructions">It\'s easier than those friggin jumbled up word things, unless you are a computer...</span>'));?>
<?php echo $this->Form->input('test_hash',array('type'=>'hidden','value'=>$md5)); ?>
<?php echo $this->Form->submit('RSVP!'); ?>

