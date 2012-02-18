

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


?>
<div id="homecontent">
<div class="home_intro aleg">Javaneh Montoya & Scott Fennell</div>
<div class="home_invitation ital">
    would like to invite you to join them on March 31st, 2012 at 4 o'clock as they begin the rest of their lives as husband and wife.
</div>

<div class="wedding_info ital">
Please join us in <span class="countdown"> <?php echo "$days days, $hours hours, $minutes minutes and $seconds seconds"; ?></span> <br/>
at the <a href="/pages/info">Kickers Sport Club at 16776 West 50th Ave. Golden, CO</a>
</div>
<div class="instructions aleg">
Please enter your RSVP code on the right (or your name) to RSVP for the wedding and reception.
</div>
</div>