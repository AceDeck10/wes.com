<?php
    if(isset($_POST['delete'])){
        require "dbconn.script.php";
        
        $btnID = $_GET['id'];
        $sql = "DELETE FROM answers WHERE qID =".$btnID;
        $sql2 = "DELETE FROM questions WHERE qID=".$btnID;
        if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
            header("Location: ../home.php?delete=success");
		    exit();
        } 
        else {
            header("Location: ../home.php?error=deleteUnsucsessfull");
            exit();
        }
        $conn->close();
    }
    else{
        header("Location: ../home.php");
		exit();
    }