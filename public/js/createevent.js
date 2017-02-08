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