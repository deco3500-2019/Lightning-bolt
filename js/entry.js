

$(window).scroll(function() {
    if($(window).scrollTop()) {
        $('nav').removeClass('trans');
    } else {
        $('nav').addClass('trans');
    }
});

function month() {

    var full_month = new Array();
    full_month[0] = "January";
    full_month[1] = "Febuary";
    full_month[2] = "March";
    full_month[3] = "April";
    full_month[4] = "May";
    full_month[5] = "June";
    full_month[6] = "July";
    full_month[7] = "August";
    full_month[8] = "Ssptember";
    full_month[9] = "October";
    full_month[10] = "November";
    full_month[11] = "December";

    var d = new Date();
    var year = d.getFullYear();
    var full_cur_month = full_month[d.getMonth()];
    var time = d.getHours() + ":" + d.getMinutes();
    var title = full_cur_month + "/" + year;

    window.onload = function a() {
        
        document.getElementById("time").innerHTML = time;
        document.getElementById("prev_title").innerHTML = title;
        console.log(title);
    }  
};

month();




function flip() {
    $("#card").toggleClass('flipped');
    console.log("flipcalled");
}


// $(".back").css('z-index', '');

