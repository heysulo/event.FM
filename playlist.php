<?php
$i = 0;
for ($i = 1; $i<27;$i++){
?>

<div class="playlist_item">

    <div class="col-md-4">
        <div class="video_thumbnail"></div>

    </div>
    <div class="col-md-6">
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
                <button type="button" class="btn btn-sm btn-success"> <span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span> Up Vote</button>
                <button type="button" class="btn btn-sm btn-danger"> <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> Down Vote</button>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="row playlist_item_position_title">
            Position
        </div>
        <div class="row playlist_item_position_number">
            <?= $i?>
        </div>
    </div>
</div>

<?php }?>