/**
 * Created by sulochana on 2/8/17.
 */

$(document).ready(function () {
    var submit_ok = 0;
})

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
    if (!/^(?=^.{3,12}$)^[a-zA-Z][a-zA-Z0-9]*[._]?[a-zA-Z0-9]+$/.test(document.getElementById("txt_username").value)){
        document.getElementById("un_alert_invalid").style.display = "block";
        document.getElementById("un_alert_unavailable").style.display = "none";
        document.getElementById("un_alert_ok").style.display = "none";
        submit_ok = 0;
    }else{
        document.getElementById("un_alert_invalid").style.display = "none";
        document.getElementById("un_alert_unavailable").style.display = "none";
        document.getElementById("un_alert_ok").style.display = "none";
        document.getElementById("div_checkingusername").style.display = "block";
        $.post("requests/checkusername.php",
            {
                username: document.getElementById("txt_username").value
            },
            function(data, status){
                document.getElementById("div_checkingusername").style.display = "none";
                if (data=="1"){
                    document.getElementById("un_alert_invalid").style.display = "none";
                    document.getElementById("un_alert_unavailable").style.display = "none";
                    document.getElementById("un_alert_ok").style.display = "block";
                    submit_ok = 1;
                }else{
                    document.getElementById("un_alert_invalid").style.display = "none";
                    document.getElementById("un_alert_unavailable").style.display = "block";
                    document.getElementById("un_alert_ok").style.display = "none";
                    submit_ok = 0;
                }
            });

    }
})

function checksb() {
    if (submit_ok==0){
        alert("The username you selected is invalid");
        return false;
    }
    return true;
}