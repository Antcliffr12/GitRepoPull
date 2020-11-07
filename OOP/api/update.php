<?php 
$opts = [
    'http' => [
            'method' => 'GET',
            'header' => [
                    'User-Agent: PHP'
            ]
    ]
];

$context = stream_context_create($opts);

// include_once '../../OOP/config/database.php';
// include_once '../../OOP/items/github.php';

include_once '../../OOP/config/database.php';
include_once '../../OOP/items/github.php';

//gets database class from file and uses connection string
$database = new Database();
$db = $database->connect();

//gets API class from file
$repo = new API($db);

//connects to GIT API I am using
$data = file_get_contents('https://api.github.com/search/repositories?q=language:php&per_page=100', false, $context); //gets $url, include path false, and we need custom context for github api

$data = json_decode($data, true); //converts $data json into an array with the true statement
$items = $data['items']; //start ref at items 

for($i = 0; $i < count($items); $i++){
    //print_r($items[$i]['id']);
     $repo->id = $items[$i]['id'];
     $repo->name = $items[$i]['full_name'];
     $repo->url = $items[$i]['html_url'];
     $repo->created_date = $items[$i]['created_at'];
     $repo->last_push_date = $items[$i]['updated_at'];
     $repo->description = $items[$i]['description'];
     $repo->number_stars = $items[$i]['stargazers_count'];

     //Update 
     $repo->update();
//     if($repo->update()){
//         echo json_encode(
//             array('message' => 'Item Updated')
//         );
//     }else{
//         echo json_encode(
//             array('message' => 'Item Not Updated')
//         );
//     }
}



