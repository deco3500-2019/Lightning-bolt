

$(window).scroll(function() {
    if($(window).scrollTop()) {
        $('nav').removeClass('trans');
    } else {
        $('nav').addClass('trans');
    }
});

function month() {

    var month = new Array();
    month[0] = "JAN";
    month[1] = "FEB";
    month[2] = "MAR";
    month[3] = "APR";
    month[4] = "MAY";
    month[5] = "JUN";
    month[6] = "JUL";
    month[7] = "AUG";
    month[8] = "SEP";
    month[9] = "OCT";
    month[10] = "NOV";
    month[11] = "DEC";


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
    console.log(d);
    var current_month = month[d.getMonth()];
    var day = d.getDate();
    var year = d.getFullYear();
    var full_cur_month = full_month[d.getMonth()];
    var time = d.getHours() + ":" + d.getMinutes();
    console.log(time);

    var date = day + "." + current_month + "." + year;
    window.onload = function a() {
        document.getElementById("month").innerHTML = current_month;
        document.getElementById("date").innerHTML=date;
        document.getElementById("cur_year").innerHTML = year;
        document.getElementById("cur_month").innerHTML = full_cur_month;
        document.getElementById("time").innerHTML = time;
    }  
};

month();




function flip() {
    $("#card").toggleClass('flipped');
    console.log("flipcalled");
}


