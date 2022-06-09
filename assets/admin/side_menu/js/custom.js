$(function() {

    "use strict";

    /* ----------------------------------------------------------------
           [ Alert Auto Close Js ]
-----------------------------------------------------------------*/

    $(function(){
        window.setTimeout(function() {
            $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);
    });

    /* ----------------------------------------------------------------
                [ Prevent Multiple Submit Js ]
-----------------------------------------------------------------*/
    $(function(){
        $('form').on('submit', function () {
            $(this).find(':submit').attr('disabled', 'true');
        });
    });

    /* ----------------------------------------------------------------
              [ Fontawesome IconPicker Js ]
-----------------------------------------------------------------*/

    $('#iconPickerBtn').iconpicker();
    $('#iconPickerBtn2').iconpicker();


    $(".iconpicker-item").click(function() {
        var li = document.getElementById('icon-value');

        if (li.className === "null") {
            document.getElementById("icon").value = "";
        } else {
            document.getElementById("icon").value = li.className;
        }


    });

    $(".iconpicker-item").click(function() {
        var li2 = document.getElementById('icon-value2');

        if (li2.className === "null") {
            document.getElementById("icon2").value = "";
        } else {
            document.getElementById("icon2").value = li2.className;
        }



    });

    /* ----------------------------------------------------------------
           [ Fontawesome IconPicker Rtl Js ]
-----------------------------------------------------------------*/

    var hasRtl  = $('body').hasClass("rtl-version");

    if (hasRtl) {
        $('.iconpicker-search').attr('placeholder', 'اكتب للتصفية');
    }


});