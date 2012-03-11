<div class="userssearchres">
<?php
if(!empty($invites)){
    echo "<span class='instructions'>Click on your name below to go to continue</span>";
    echo "<ul>";
    foreach($invites as $invite){
        echo "<li>{$invite['Invite']['name']} - <a href='/rsvp/edit/{$invite['Invite']['uid']}'>";
        if($invite['Invite']['confirmed']){
            echo "has already RSVP'd!";
        } else {
            echo "I'll be there! RSVP Now";
        }
        echo "</a></li>";
    }
    echo "</ul>";
} else {
    echo "Nothing found yet ... try searching for your last name, or use the RSVP code that came with your invitation";
}
?>
</div>