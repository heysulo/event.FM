<div class="row page_title">
    event playlist
</div>
<p class="text-muted">Event playlist holds all the songs and videos requested my the participants. In here you can add remove songs to the event playlist and also view,approve and reject the songs requested by the participants</p>
<button type="button" class="btn btn-success" style="background-color: #f50;border-color: #f50;margin: 10px;" data-toggle="modal" data-target="#basicModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add a New Song to the Playlist</button>
<?php
$i = 0;
for ($i = 1; $i<27;$i++){
    ?>
    <div class="playlist_item">
        <div class="col-md-1">
            <div class="row playlist_item_position_title">
                Position
            </div>
            <div class="row playlist_item_position_number">
                <?= $i?>
            </div>
        </div>

        <div class="col-md-2">
            <div class="video_thumbnail"></div>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="video_title">Tesla Autopilot Predicts Crash before it happends Compilation [All]</div>
            </div>
            <div class="row">
                <div class="video_requestor">Requested by Sulochana Kodituwakku</div>
            </div>
            <div class="row">
                <div class="progressbar_main">
                    <div class="progressbar_value"></div>
                </div>
            </div>
            <div class="row btn_voting" >
                <div class="btn-group" role="group" aria-label="Make your vote">
                    <button type="button" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Remove Song</button>
                </div>
            </div>
        </div>
        <div class="col-md-5"></div>

    </div>



<?php }?>
