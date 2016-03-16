$( document ).ready(function() {

    var ua = navigator.userAgent;
    var browserName= navigator.appName;
    var nameOffset,verOffset,ix;

    //Google Chrome
    if ((verOffset=ua.indexOf("Chrome"))!=-1) {
        browserName = "Chrome";

    }
// Opera 15+,
    else if ((verOffset=ua.indexOf("OPR/"))!=-1) {
        browserName = "Opera";

    }

// older Opera,
    else if ((verOffset=ua.indexOf("Opera"))!=-1) {
        browserName = "Opera";

    }
// Microsoft IE
    else if ((verOffset=ua.indexOf("MSIE"))!=-1) {
        browserName = "Microsoft Internet Explorer";

    }

//Apple Safari
    else if ((verOffset=ua.indexOf("Safari"))!=-1) {
        browserName = "Safari";

    }
//Firefox
    else if ((verOffset=ua.indexOf("Firefox"))!=-1) {
        browserName = "Firefox";

    }
//other browsers
    else if ( (nameOffset=ua.lastIndexOf(' ')+1) <
        (verOffset=ua.lastIndexOf('/')) )
    {
        browserName = ua.substring(nameOffset,verOffset);

    }

   if(browserName!="Chrome"){

       if($('.fecha').attr('type')=='date'){
           $('.fecha').attr('type','text')
           $('.fecha').attr('placeholder','yyyy/mm/dd')
           $('.fecha').mask('0000-00-00')

           $('.fecha').mask("0000-ab-cd", {
               translation: {
                   'a': {
                       pattern: /[0]/

                   },
                   'b': {
                       pattern: /[1-9]/

                   },
                   'c': {
                       pattern: /[0]/

                   },
                   'd': {
                       pattern: /[1-9]/

                   }

               }
           });

           $('.fecha').mask("0000-ab-cd", {
               translation: {
                   'a': {
                       pattern: /[0]/

                   },
                   'b': {
                       pattern: /[1-9]/

                   },
                   'c': {
                       pattern: /[12]/

                   },
                   'd': {
                       pattern: /[0-9]/

                   }

               }
           });
       }
   }

});