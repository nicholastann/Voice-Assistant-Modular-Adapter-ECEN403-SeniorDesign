<?php

header("access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../config/Database.php";
include _once "../../models/Post.php";

//instaniate DB & conn

$database = new Database();
$db = $database->connect();

//instantiate post obj
$post = new Post($db);

//post query
$result = $post->read();

$num = $result->rowCount();

//check if posts
if($num > 0) {
    //post array
    $posts_arr = array();
    $posts_arr["data"] = array();

    while($row = $results->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            "id" => $id,
            "status" => $status,
        );

        //push to "data"
        array_push($posts_arr["data"], $post_item);
    }
    //to JSON
    echo json_encode($posts_arr);
} else {
    echo json_encode(
        array("message" => "no posts found")
    );
}