$(document).ready(function() {

     /* For Clock1 */             

     setInterval( function() {
      var seconds = new Date().getUTCSeconds() - 14400;
      var sdegree = seconds * 6;
      var srotate = "rotate(" + sdegree + "deg)";
      $("#sec1").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
      }, 1000 );
     

     setInterval( function() {
     var hours = new Date().getUTCHours() - 4;
     var mins = new Date().getUTCMinutes() - 240;
     var hdegree = hours * 30 + (mins / 2);
     var hrotate = "rotate(" + hdegree + "deg)";
     $("#hour1").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
     }, 1000 );

     setInterval( function() {
     var mins = new Date().getUTCMinutes() - 240;
     var mdegree = mins * 6;
     var mrotate = "rotate(" + mdegree + "deg)";
     $("#min1").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
     }, 1000 );


     /* For Clock2 */             

     setInterval( function() {
      var seconds = new Date().getUTCSeconds();
      var sdegree = seconds * 6;
      var srotate = "rotate(" + sdegree + "deg)";
      $("#sec2").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
      }, 1000 );
     

     setInterval( function() {
     var hours = new Date().getUTCHours();
     var mins = new Date().getUTCMinutes();
     var hdegree = hours * 30 + (mins / 2);
     var hrotate = "rotate(" + hdegree + "deg)";
     $("#hour2").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
     }, 1000 );

     setInterval( function() {
     var mins = new Date().getUTCMinutes();
     var mdegree = mins * 6;
     var mrotate = "rotate(" + mdegree + "deg)";
     $("#min2").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
     }, 1000 );

     /* For Clock3 */             

     setInterval( function() {
      var seconds = new Date().getUTCSeconds() - 28800;
      var sdegree = seconds * 6;
      var srotate = "rotate(" + sdegree + "deg)";
      $("#sec3").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
      }, 1000 );
     

     setInterval( function() {
     var hours = new Date().getUTCHours() - 8;
     var mins = new Date().getUTCMinutes() - 480;
     var hdegree = hours * 30 + (mins / 2);
     var hrotate = "rotate(" + hdegree + "deg)";
     $("#hour3").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
     }, 1000 );

     setInterval( function() {
     var mins = new Date().getUTCMinutes() - 480;
     var mdegree = mins * 6;
     var mrotate = "rotate(" + mdegree + "deg)";
     $("#min3").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
     }, 1000 );

     /* For Clock4 */             

     setInterval( function() {
      var seconds = new Date().getUTCSeconds() + 28800;
      var sdegree = seconds * 6;
      var srotate = "rotate(" + sdegree + "deg)";
      $("#sec4").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
      }, 1000 );
     

     setInterval( function() {
     var hours = new Date().getUTCHours() + 8;
     var mins = new Date().getUTCMinutes() + 480;
     var hdegree = hours * 30 + (mins / 2);
     var hrotate = "rotate(" + hdegree + "deg)";
     $("#hour4").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
     }, 1000 );

     setInterval( function() {
     var mins = new Date().getUTCMinutes() + 480;
     var mdegree = mins * 6;
     var mrotate = "rotate(" + mdegree + "deg)";
     $("#min4").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
     }, 1000 );

}); 