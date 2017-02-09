<div class="row userbar">
    <div class="navbar-header">
        <img src="<?=$publicPath?>/img/eventfm.png" width="170px" height="35px" style="margin-top: 5px;margin-left: 10px;">
    </div>
    <div class="nav navbar-nav" style="width: 100px;height: 50px;">

    </div>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a style="padding-bottom: 5px">
            <div class="row">
                <div class="user_img_top col-xs-6" style="background-image: url('<?php echo 'https://graph.facebook.com/'.$userNode->getId().'/picture?type=square' ?>')"></div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-12 username">
                            <?php  echo $userNode->getName();?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 userteam">
                            <?php  echo $userNode->getProperty('email');?>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </li>

        <li><a href="<?php echo $host.'logout.php';?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
</div>