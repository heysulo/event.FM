<?php
/**
 * Created by PhpStorm.
 * User: sulochana
 * Date: 2/11/17
 * Time: 3:57 PM
 */

function getvideoinfo($id){
    $key = "AIzaSyAI3D-wMt-EPi5uzToHGq5HZN4ycENTAIY";
    $response = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id=".$id."&key=".$key);
    $response = json_decode($response);
    if ($response->items == null){
        return null;
    }else {
        $obj = new stdClass();
        $obj->id = $id;
        $obj->description = $response->items[0]->snippet->description;
        $obj->title = $response->items[0]->snippet->title;
        $obj->date = $response->items[0]->snippet->publishedAt;
        $obj->channel = $response->items[0]->snippet->channelTitle;
        $obj->thumbnail_default = $response->items[0]->snippet->thumbnails->default->url;
        $obj->thumbnail_medium = $response->items[0]->snippet->thumbnails->medium->url;
        $obj->thumbnail_high = $response->items[0]->snippet->thumbnails->high->url;
        $obj->viewCount = $response->items[0]->statistics->viewCount;
        $obj->likeCount = $response->items[0]->statistics->likeCount;
        $obj->dislikeCount = $response->items[0]->statistics->dislikeCount;
        $obj->link = "http://www.youtube.com/watch?v=" . $id;
        return json_encode($obj);
    }
}

if (isset($_POST['url'])){
    $link_vars = null;
    parse_str( parse_url( $_POST['url'], PHP_URL_QUERY ), $link_vars );
    if (!isset($link_vars['v'])){
        die();
    }
    echo getvideoinfo($link_vars['v']);
}
