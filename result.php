<?php

    include("includes/CRUD.php");
    include("includes/header.php");
    $query = new query();

    $allSubmissions = $query->getData("lottery", "*");

    $finalSubs = array();
    $logicArray = array(0,0,2,0,0,3);

    foreach($allSubmissions as $sub){

        if($sub["submissions"] == 2 or $sub["submissions"] == 3 or $sub["submissions"] == 5){
            $value = $logicArray[$sub["submissions"]];
        }
        else{
            $value = 1;
        }
        for($i = 1; $i<=$value; $i++){
            $finalSubs[] = $sub["email"];
        }
    }

    $result = rand(0, count($finalSubs)-1);

    if($finalSubs != []){
        $email = $finalSubs[$result];
        $name = $query->getData("lottery", "name, email", array("email"=>$finalSubs[$result]))[0]["name"];
        echo "<br><br><h1 class='text-center'>Winner is $name with email $email!!!</h1>";
    }
    else{
        echo "<br><br><h1 class='text-center'>Sorry! No Contestants to Select</h1>";
    }

?>




<?php

    //including the footer
    include_once("includes/footer.php") 

?>