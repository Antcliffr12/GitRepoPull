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

//connects to Database file and uses connect class
$database = new Database();
$db = $database->connect();

//uses API class from file
$repo = new API($db);

//using read function from read Class
$stmt = $repo->read();

$num = $stmt->rowCount();

if($num > 0){

    $repo_array = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $repo_items = array(
            "id" => $id,
            "full_name" => $name,
            "url" => $url,
            "created_date" => $created_date,
            "last_push_date" => $last_push_date,
            "description" => html_entity_decode($description),
            "number_stars" => $number_stars,
        );

        array_push($repo_array, $repo_items);
    }

 
   // echo json_encode($repo_array);
}else{
     // set response code - 404 Not found
     http_response_code(404);
  
     // tell the user no repos found
     echo json_encode(
         array("message" => "No repos found.")
     );
}