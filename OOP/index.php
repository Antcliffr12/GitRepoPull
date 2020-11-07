<?php include_once '../OOP/header.php'; //gets header ?> 
<div class="container">

    <div class="box">
        <div class="box-header d-md-flex flex-items-center flex-justify-between">
            <h1>Top PHP Projects</h1>
        </div>
        <?php 
        //loop through the data in read function in API Class
            foreach($repo_array as $items){
                $id = $items['id'];
                $name = $items['full_name'];
                $url = $items['url'];
                $created_date = $items['created_date'];
                $last_push = $items['last_push_date'];
                $description = $items['description'];
                $stars = $items['number_stars'];

                $full = explode('/', $name);
                $first = $full[0];
                $second = $full[1];

                $date = new DateTime($created_date);
                $created_date = $date->format('F d, Y');

                $updateDate = new DateTime($last_push);
                $last_push = $updateDate->format('F d, Y');
                
                //did it this for easier to read and change certain section

                $row = '<div class="box-row">';
                $row .= '<h2><a class="link-image" href="'.$url.'" target="_blank" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal mr-1 text-gray" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
              </svg><span class="ml-1 font-weight-light">'.$first . '</span> / ' . $second .'</a></h2>';
                
                $row .= '<p class="col-9 text-grey my-1">'.$description.'</p>';

                $row .= '<div class="f6 text-gray mt-2">';

                $row .= '<span class="d-inline-block ml-0 mr-3"><div class="color-repo" style="background-color: #4F5D95"></div><span class="ml-1" style="font-size:12px;">PHP</span></span>';
                $row .= '<div class="muted-link d-inline-block mr-3 star-wrap"><svg width="16px" height="16px" viewBox="0 0 16 16" class="bi bi-star star mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg><span>'.$stars.'</span></div>';

                $row .= '<span class="mr-2" style="font-size:14px;">ID: '.$id . ' </span>';

                $row .= '<span class="mr-2" style="font-size:14px;">Created: '.$created_date . ' </span>';

                $row .= '<span class="mr-2" style="font-size:14px;">Last Updated: '. $last_push . ' </span>';

                $row .= '</div>';
                $row .= '</div>';
                echo $row;

            }

        ?>
        
    </div>
    <!-- button to load a certain number of posts at a time -->
        <div class="btn-wrap">

        <div class="btn btn-secondary mt-4" id="btn-load-more" style="margin:0 auto; display:block; width:10%;">Load More</div>

        </div>

</div> <!-- /container -->

    <?php include_once '../OOP/footer.php';  ?>
