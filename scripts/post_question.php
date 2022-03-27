<?php
    if(isset($_POST['submit'])){
        session_start();
        require "dbconn.script.php";

        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y/m/d H:i:s');
        $question = $_POST['question'];
        $userID = $_SESSION['userID'];

        if(empty($date) || empty($question) || empty($userID)){
            header("Location: ../home.php?error=emptyfields+date=".$date."+q=".$question."+uid=".$userID);
            exit();
        }
        else{
            $sql = "INSERT INTO questions(qDate, qText, userID) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                $error = mysqli_error($conn);
                header("Location: ../home.php?error=sqlError+error=".$error);
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ssi", $date, $question, $userID);
                mysqli_stmt_execute($stmt);
                header("Location: ../home.php?post=success");
                exit();
            }
            
            $conn->close();
        }
    }
    else{
        header("Location: ../home.php");
    }