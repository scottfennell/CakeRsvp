<?php
if(!empty($invites)){
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
    echo "";
}

?>