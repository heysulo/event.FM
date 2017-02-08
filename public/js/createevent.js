/**
 * Created by sulochana on 2/8/17.
 */

$("#chk_explicit").click(function () {
    if (document.getElementById("chk_explicit").checked == true){
        document.getElementById("alert_expl").style.display = "block";
    }else {
        document.getElementById("alert_expl").style.display = "none";

    }

})

$("#chk_whitelist").click(function () {
    if (document.getElementById("chk_whitelist").checked == true){
        document.getElementById("chk_explicit").disabled = false;
    }else {
        document.getElementById("chk_explicit").disabled = true;
        document.getElementById("chk_explicit").checked = false;
        document.getElementById("alert_expl").style.display = "none";

    }

})

$("#txt_username").focusout(function () {
    if (document.getElementById("txt_username").value != "" && !/^(?=.{5,12}$)([a-zA-Z0-9]+[._]{0,1}[a-zA-Z0-9]+)+$/.test(document.getElementById("txt_username").value)){
        document.getElementById("un_alert_invalid").style.display = "block";
        document.getElementById("un_alert_unavailable").style.display = "none";
        document.getElementById("un_alert_ok").style.display = "none";
    }else{
        document.getElementById("un_alert_invalid").style.display = "none";
        document.getElementById("un_alert_unavailable").style.display = "none";
        document.getElementById("un_alert_ok").style.display = "none";
        document.getElementById("div_checkingusername").style.display = "block";
        $.post("requests/checkusername.php",
            {
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data, status){
                document.getElementById("div_checkingusername").style.display = "none";
                if (data=="1"){
                    document.getElementById("un_alert_invalid").style.display = "none";
                    document.getElementById("un_alert_unavailable").style.display = "none";
                    document.getElementById("un_alert_ok").style.display = "block";
                }else{
                    document.getElementById("un_alert_invalid").style.display = "none";
                    document.getElementById("un_alert_unavailable").style.display = "block";
                    document.getElementById("un_alert_ok").style.display = "none";
                }
            });

    }
})