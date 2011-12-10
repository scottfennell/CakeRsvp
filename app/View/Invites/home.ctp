<h2>Scott & Javaneh's Wedding</h2>
<h3>in</h3>

<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $wedding =  strtotime("2012-03-31 04:00:00") ;
    $today = time();
    $diff_seconds = $wedding - $today;
    $days = floor($diff_seconds / 86400);
    $htime = $diff_seconds%86400;
    $hours = floor(($htime)/3600);
    $mtime = $htime%3600;
    $minutes = floor($mtime/60);
    $seconds = $mtime%60;

    echo "$days: days, $hours: hours, $minutes: minutes, $seconds:seconds";
?>

<div class="rsvp_form">
    <p>Please enter your full name here to rsvp for the wedding</p>
<?php
    echo $this->Form->create();
    echo $this->Form->input("name");
    echo $this->Form->input("email");
    echo $this->Form->submit();
?>
</div>