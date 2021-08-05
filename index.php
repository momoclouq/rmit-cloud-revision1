<?php
    session_start();
    require 'controller.php';

    //process request
    //check request from the user
    if(isset($_POST["add"]) && $_POST["add"] == 1) add_request();
    if(isset($_POST["delete"])) delete_request();
    if(isset($_POST["update"])) update_request();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fake document</title>
    </head>

<!--app body-->
<body>
    <form action="" method="POST">
        <h3>Create a new employee</h3>
        <label for="id">Id: </label>
        <input type="text" name="id" placeholder="new id" required>
        <br>
        <label for="first_name">First name: </label>
        <input type="text" name="first_name" placeholder="Jake" required>
        <br>
        <label for="last_name">Last name: </label>
        <input type="text" name="last_name" placeholder="Helmington" required>
        <br>
        <label for="gender">Gender: </label>
        <select name="gender">
            <option value="M" selected>Male</option>
            <option value="F">Female</option>
        </select>
        <br>
        <label for="age">Age: </label>
        <input type="number" min="1" name="age" required>
        <br>
        <label for="address">Address: </label>
        <input type="text" name="address" required>
        <br>
        <label for="phone">Phone: </label>
        <input type="text" name="phone" required>
        <button type="submit" name="add" value="1">Create employee</button>
    </form>
    <br>
    <div>Number of employees: <?php if(isset($_SESSION["list"])) echo count($_SESSION["list"]); else echo "0"; ?></div>
    <hr>
<?php
    //display all employees from the list
    if(isset($_SESSION["list"])){
        $tempList = $_SESSION["list"];

        for($i = 0; $i < count($tempList); $i++){
            $id = $tempList[$i]["id"];
            $first_name = $tempList[$i]["first_name"];
            $last_name = $tempList[$i]["last_name"];
            $gender = $tempList[$i]["gender"];
            $age = $tempList[$i]["age"];
            $address = $tempList[$i]["address"];
            $phone = $tempList[$i]["phone"];

            $output = <<<"HTML"
                <form action="" method="POST">
                    <label for="id">Id: </label>
                    <input type="text" value="$id" name="id" placeholder="new id" required>
                    <br>
                    <label for="first_name">First name: </label>
                    <input type="text" value="$first_name" name="first_name" placeholder="Jake" required>
                    <br>
                    <label for="last_name">Last name: </label>
                    <input type="text" value="$last_name" name="last_name" placeholder="Helmington" required>
                    <br>
                    <label for="gender">Gender: </label>
                    <select name="gender">
                        <option value="M" selected>Male</option>
                        <option value="F">Female</option>
                    </select>
                    <br>
                    <label for="age">Age: </label>
                    <input type="number" min="1" value="$age" name="age" required>
                    <br>
                    <label for="address">Address: </label>
                    <input type="text" value="$address" name="address" required>
                    <br>
                    <label for="phone">Phone: </label>
                    <input type="text" value="$phone" name="phone" required>

                    <button type="submit" name="update" value="$i">Update with info</button>
                    <button type="submit" name="delete" value="$i">Delete</button>
                </form>

                <br>
            HTML;

            echo $output;
        }
    }
?>

</body>
</html>