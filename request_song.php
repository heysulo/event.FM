
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row column_title">
                    Request a song
                </div>
            </div>
            <form id="frm_request_song">
            <div class="modal-body">
                <div class="row">
                    <label for="basic-url">YouTube Video Link</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
                        <input type="text" class="form-control" id="song_link_input" placeholder="Enter Link Here...">
                    </div>
                </div>
                <p class="text-muted">Paste the YouTube video link of the song you wish to be played during the event. Once you submit the link it will go through an approval process and upon approval it will be added to the playlist.
                    <br><br>Example : https://www.youtube.com/watch?v=RgKAFK5djSk </p>
                <div class="row" style="display: none" id="div_checkvideo">
                    <br>
                    <div class="col-md-3"></div>
                    <div class="col-md-1">
                        <div class="loader"></div>
                    </div>
                    <div class="col-md-5">
                        <label for="basic-url">Getting video info</label>
                    </div>
                    <div class="col-md-3"></div>


                </div>
                <div id="div_invalid_url" class="alert alert-danger" role="alert" style="display: none;"><b>Invalid URL!</b> The YouTube Video link you provided does not seems to be valid.</div>
                <div id="div_video_info" style="display: none;">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3 song_thumbnail" id="video_thumb"></div>
                        <div class="col-md-7">
                            <div class="row" style="padding-top: 0px">
                                <div class="song_title" id="song_title">Backstreet Boys - 1998 - Today - Quit Playing Games With My Heart (@_BoysOnTheBlock)</div>
                            </div>
                            <div class="row" >
                                <div class="song_description" id="song_description">Backstreet Boys - 1998 - Today - Quit Playing Games With My Heart (@_BoysOnTheBlock)</div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Request</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel</button>
            </div>
            </form>

        </div>
    </div>
</div>
