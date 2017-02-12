/**
 * Created by sulochana on 2/11/17.
 */
$("#song_link_input").keyup(function () {
    console.log("Sdsd");
    txt_input = document.getElementById("song_link_input");
    document.getElementById("div_checkvideo").style.display = "block";
    document.getElementById("div_invalid_url").style.display = "none";
    document.getElementById("div_video_info").style.display = "none";
    $.post("requests/youtube.php",
        {
            url: txt_input.value
        },
        function(data, status){

            document.getElementById("div_checkvideo").style.display = "none";
            if (data==""){
                document.getElementById("div_invalid_url").style.display = "block";
                document.getElementById("div_video_info").style.display = "none";
            }else{
                try {
                    var obj = JSON.parse(data);
                    document.getElementById("div_invalid_url").style.display = "none";
                    document.getElementById("div_video_info").style.display = "block";
                    document.getElementById("song_title").innerHTML = obj.title;
                    document.getElementById("song_description").innerHTML = obj.description;
                    document.getElementById("video_thumb").style.backgroundImage = "url(" + obj.thumbnail_medium + ")";

                }catch (err){
                    document.getElementById("div_invalid_url").style.display = "block";
                    document.getElementById("div_video_info").style.display = "none";
                }
            }

        });
})
