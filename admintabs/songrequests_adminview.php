<div class="row page_title">
    Song requests
</div>
<p class="text-muted">The songs requested by the participants are displayed here. You can either accept a request and add that song to the Event playlist or ignore the request which will not affect the event playlist. If the Event.FM whitelist is enabled once a user requested one of the songs in the whitelist it will be approved without the acknowledgement of the event administrator. Still even if it's turned off <span class="glyphicon glyphicon-ok-sign video_title" aria-hidden="true"></span> sign will indicate that the song is in the event.FM whitelist, and <span class="glyphicon glyphicon-exclamation-sign" style="color: red" aria-hidden="true"></span> sign will indicate that the event.FM has detected that the song consists of explicit content.</p>
<div class="row">


<?php
$i = 0;
include_once ("addnewsong.php");
for ($i = 1; $i<28;$i++){
    ?>
    <div class="col-md-6">
        <div class="playlist_item">
            <div class="col-md-4">
                <div class="video_thumbnail"></div>

            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="video_title">Tesla Autopilot Predicts Crash before it happends Compilation [All] <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> <span class="glyphicon glyphicon-exclamation-sign" style="color: red" aria-hidden="true"></span> </div>
                </div>
                <div class="row">
                    <div class="video_requestor">Requested by Sulochana Kodituwakku</div>
                </div>
                <div class="row btn_voting" >
                    <div class="btn-group" role="group" aria-label="Make your vote">
                        <button type="button" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Accept Request</button>
                        <button type="button" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove Request</button>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>



<?php }?>
</div>

