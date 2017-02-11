/**
 * Created by sulochana on 2/9/17.
 */
$(document).ready(function () {
    tabswitch(1);
})

function tabswitch(tab) {
    var tab_1 = document.getElementById("tab_1");
    var tab_2 = document.getElementById("tab_2");
    var tab_3 = document.getElementById("tab_3");
    var tab_4 = document.getElementById("tab_4");
    var loader = document.getElementById("div_load");
    var content = document.getElementById("tab_content_div");
    var handler;

    loader.style.display = "block";
    //content.style.display = "none";
    switch (tab){
        case 1:
            tab_1.className = "group_main_menu_item group_main_menu_item_active";
            tab_2.className = "group_main_menu_item";
            tab_3.className = "group_main_menu_item";
            tab_4.className = "group_main_menu_item";
            handler="./admintabs/playlist_adminview.php";
            break;
        case 2:
            tab_1.className = "group_main_menu_item";
            tab_2.className = "group_main_menu_item group_main_menu_item_active";
            tab_3.className = "group_main_menu_item";
            tab_4.className = "group_main_menu_item";
            handler="./admintabs/songrequests_adminview.php";
            break;
        case 3:
            tab_1.className = "group_main_menu_item";
            tab_2.className = "group_main_menu_item";
            tab_3.className = "group_main_menu_item group_main_menu_item_active";
            tab_4.className = "group_main_menu_item";
            handler="./admintabs/shoutouts_adminview.php";
            break;
        case 4:
            tab_1.className = "group_main_menu_item";
            tab_2.className = "group_main_menu_item";
            tab_3.className = "group_main_menu_item";
            tab_4.className = "group_main_menu_item group_main_menu_item_active";
            handler="./admintabs/settings.php";
            break;
        default:
            tab_1.className = "group_main_menu_item group_main_menu_item_active";
            tab_2.className = "group_main_menu_item";
            tab_3.className = "group_main_menu_item";
            tab_4.className = "group_main_menu_item";
            handler="./admintabs/playlist_adminview.php";
            break;
    }
    $.post(handler,
        {
            username: everntun
        },
        function(data, status){
            content.innerHTML = data;
            loader.style.display = "none";
            content.style.display = "block";
            jsajax =document.getElementById("js_ajax");
            if (jsajax!=null){
                console.log("evaluating JS_AJAX");

                eval(jsajax.innerHTML);
            }
        });
}
