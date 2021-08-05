<?php
    function add_request(){
        if(!isset($_SESSION["list"])) $_SESSION["list"] = [];
        $_SESSION["list"][] = [
            "id" => $_POST["id"],
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "gender" => $_POST["gender"],
            "age" => $_POST["age"],
            "address" => $_POST["address"],
            "phone" => $_POST["phone"]
        ];
    }

    function delete_request(){
        $value = $_POST["delete"];
        $list = $_SESSION["list"];

        if($value >= 0 && $value <= count($_SESSION["list"])-1){
            array_splice($list, $value, 1);
            $_SESSION["list"] = $list;
        }
    }

    function update_request(){
        $value = $_POST["update"];

        if($value >= 0 && $value <= count($_SESSION["list"])-1){
            $_SESSION["list"][$value] = [
                "id" => $_POST["id"],
                "first_name" => $_POST["first_name"],
                "last_name" => $_POST["last_name"],
                "gender" => $_POST["gender"],
                "age" => $_POST["age"],
                "address" => $_POST["address"],
                "phone" => $_POST["phone"]
            ];
        }
    }
?>