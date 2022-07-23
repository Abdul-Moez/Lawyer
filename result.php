<?php
 
include_once("./include/conn.inc.php");

if(isset($_POST['search']))
{

    $search_val=$_POST['search_term'];
	
    $query = "SELECT * FROM `lawyer` WHERE `name` LIKE '$search_val%' OR `title` LIKE '$search_val%'";

    // $query = "SELECT * FROM `lawyer` WHERE 1 ";

    // SELECT * FROM `lawyer` WHERE Name LIKE 'l%';

    $get_result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($get_result)) {

        // echo "<li><span class='title'>".$row['1']."</span></li>";

        $id = $row[0];
        $idAfter = base64_encode($id);
        
        echo "<div class='col-lg-3 col-md-6'>
        <div class='team-item'>
            <div class='team-img'>
                <img src='./lawyer_dashboard/user_img/".$row['10']."' alt='Team Image'>
            </div>
            <div class='team-text'>
                <h2>".$row['1']."</h2>
                <p>".$row['2']."</p>
                <div class='team-social'>
                    <a class='btn' href='./single.php?id=".$idAfter."'>Learn More</a>
                </div>
            </div>
        </div>
    </div>";
    }
}

?>