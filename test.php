<?php
$key = "AIzaSyAI3D-wMt-EPi5uzToHGq5HZN4ycENTAIY";
$url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
$link_vars = null;
parse_str( parse_url( $url, PHP_URL_QUERY ), $link_vars );
if (!isset($link_vars['v'])){
    echo "invalid YT link";
    die("deda");
}

$response = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id=".$link_vars['v']."&key=".$key);
$response = json_decode($response);
echo $response->items[0]->snippet->description;
echo $response->items[0]->statistics->viewCount;
?>

