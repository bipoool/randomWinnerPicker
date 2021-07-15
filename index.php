<?php

    include_once("includes/CRUD.php");
    include_once("includes/header.php");

    //defining a function for validation(Email, name, password etc...) Good from protection from SQL injection
    function validateData($data){
        $textPattern = "/^[a-zA-Z0-9!@#$%^&*\.\s&\-]*$/";
        return preg_match($textPattern, $data);
    }

    //After the submit button is pressed
    if(isset($_POST["submit"])){
        if(validateData($_POST["name"])){
            $name = $_POST["name"];
        }
        else{
            $error = "Name is not valid";
        }

        if(validateData($_POST["email"])){
            $email = $_POST["email"];
        }
        else{
            $error = "Email is not valid";
        }

        if(!isset($error)){

            $query = new query();
            $result = $query->getData("lottery", "*", array("email"=>$email));
            if(!$result){
                $query->addData("lottery", array("name"=>$name,"email"=>$email, "submissions"=>1));
            }
            else{
                $submissions = $result[0]["submissions"];
                $query->updateData("lottery", array("submissions"=>($submissions+1)), array("email"=>$email));
            }
        }
    }


?>

    <h1 id="heading" class="text-center">Lottery Form!!</h1>
    <div class="container col-sm-4 col-sm-offset-4" id="main-block">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>?submitted=true" method = "POST">

            <?php if(isset($error)) echo "<div class = 'alert alert-danger'>$error</div>" ?>
            <?php if(isset($_GET["submitted"])) echo "<div class = 'alert alert-success'>Successfully Submitted</div>" ?>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>

            <div class="form-group">
                <input type="Email" name ="email" class="form-control" placeholder="Email" required>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-success center-block">

        </form>
        
    </div>
    
<?php 
    //adding the footer 
    include_once("includes/footer.php");
?>