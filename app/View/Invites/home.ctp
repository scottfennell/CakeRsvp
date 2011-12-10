<h2>Scott & Javaneh's Wedding</h2>
<h3>in</h3>

<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $wedding =  strtotime("2012-03-31 04:00:00") ;
    $today = time();
    $start  = date('Y-m-d H:i:s');
    $end    = date('Y-m-d H:i:s', $wedding);
    $d_start    = new DateTime($start);
    $d_end      = new DateTime($end);
    $diff = $d_start->diff($d_end);
    // return all data
    $difftime = $diff->format('%m months : %d days : %h hours : %i minutes : %s seconds');
//    $this->year    = $diff->format('%y');
//    $this->month    = $diff->format('%m');
//    $this->day      = $diff->format('%d');
//    $this->hour     = $diff->format('%h');
//    $this->min      = $diff->format('%i');
//    $this->sec      = $diff->format('%s');
    echo $difftime;
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