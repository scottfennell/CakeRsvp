/* Author:

*/

var search = function(){
    var srch = $('#usernamesearch').val();
    if(srch.length>2){
        $.ajax({
            url: "/rsvp/search/"+srch,
            success: function(data){
                try {
                    if(data.Invite && data.Invite.uid){
                        window.location = "/rsvp/edit/"+data.Invite.uid;
                    } else {
                        $('#userlist').html(data);
                    }
                } catch (e){
                    $('#userlist').html(data);
                }
           }
        });
    } else {
        $("#userlist").html("Please enter at least 3 letters to search");
    }
}

$(document).ready(function(){
    //$('#usernamesearch').keypress(search);
    $("#rsvp_search").click(search);
    var futuredate=new cdtime("countdowncontainer", "March 31, 2012 18:00:00")
    futuredate.displaycountdown("days", formatresults)
});

/***********************************************
* Dynamic Countdown script- © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

function cdtime(container, targetdate){
    if (!document.getElementById || !document.getElementById(container)) return
    this.container=document.getElementById(container)
    this.currentTime=new Date()
    this.targetdate=new Date(targetdate)
    this.timesup=false
    this.updateTime()
}

cdtime.prototype.updateTime=function(){
    var thisobj=this
    this.currentTime.setSeconds(this.currentTime.getSeconds()+1)
    setTimeout(function(){thisobj.updateTime()}, 1000) //update time every second
}

cdtime.prototype.displaycountdown=function(baseunit, functionref){
    this.baseunit=baseunit
    this.formatresults=functionref
    this.showresults()
}

cdtime.prototype.showresults=function(){
    var thisobj=this


    var timediff=(this.targetdate-this.currentTime)/1000 //difference btw target date and current date, in seconds
    if (timediff<0){ //if time is up
        this.timesup=true
        this.container.innerHTML=this.formatresults()
        return
    }
    var oneMinute=60 //minute unit in seconds
    var oneHour=60*60 //hour unit in seconds
    var oneDay=60*60*24 //day unit in seconds
    var dayfield=Math.floor(timediff/oneDay)
    var hourfield=Math.floor((timediff-dayfield*oneDay)/oneHour)
    var minutefield=Math.floor((timediff-dayfield*oneDay-hourfield*oneHour)/oneMinute)
    var secondfield=Math.floor((timediff-dayfield*oneDay-hourfield*oneHour-minutefield*oneMinute))
    if (this.baseunit=="hours"){ //if base unit is hours, set "hourfield" to be topmost level
        hourfield=dayfield*24+hourfield
        dayfield="n/a"
    }
    else if (this.baseunit=="minutes"){ //if base unit is minutes, set "minutefield" to be topmost level
        minutefield=dayfield*24*60+hourfield*60+minutefield
        dayfield=hourfield="n/a"
    }
    else if (this.baseunit=="seconds"){ //if base unit is seconds, set "secondfield" to be topmost level
        var secondfield=timediff
        dayfield=hourfield=minutefield="n/a"
    }
    this.container.innerHTML=this.formatresults(dayfield, hourfield, minutefield, secondfield)
    setTimeout(function(){thisobj.showresults()}, 1000) //update results every second
}

/////CUSTOM FORMAT OUTPUT FUNCTIONS BELOW//////////////////////////////

//Create your own custom format function to pass into cdtime.displaycountdown()
//Use arguments[0] to access "Days" left
//Use arguments[1] to access "Hours" left
//Use arguments[2] to access "Minutes" left
//Use arguments[3] to access "Seconds" left

//The values of these arguments may change depending on the "baseunit" parameter of cdtime.displaycountdown()
//For example, if "baseunit" is set to "hours", arguments[0] becomes meaningless and contains "n/a"
//For example, if "baseunit" is set to "minutes", arguments[0] and arguments[1] become meaningless etc


function formatresults(){
    if (this.timesup==false){//if target date/time not yet met
        var displaystring=arguments[0]+" days "+arguments[1]+" hours "+arguments[2]+" minutes "+arguments[3]+" seconds left until Scott & Javaneh's Wedding"
    }
    else{ //else if target date/time met
        var displaystring="Future date is here!"
    }
    return displaystring
}

function formatresults2(){
    if (this.timesup==false){ //if target date/time not yet met
        var displaystring="<span class='lcdstyle'>"+arguments[0]+" <sup>days</sup> "+arguments[1]+" <sup>hours</sup> "+arguments[2]+" <sup>minutes</sup> "+arguments[3]+" <sup>seconds</sup></span> left until this Christmas"
    }
    else{ //else if target date/time met
        var displaystring="" //Don't display any text
        alert("Christmas is here!") //Instead, perform a custom alert
    }
    return displaystring
}