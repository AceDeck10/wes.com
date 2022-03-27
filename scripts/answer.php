<?php
    if(isset($_POST['submit'])){
        session_start();
        require "dbconn.script.php";

        date_default_timezone_set('africa/nairobi');
        $date = date('Y/m/d H:i:s');
        $answer = $_POST['answer'];
        $qID = $_GET['id'];
        $userID = $_SESSION['userID'];
        

        if(empty($date) || empty($answer) || empty($qID) || empty($userID)){
            header("Location: ../home.php?error=emptyfields+date=".$date."+a=".$answer."+qid=".$qID."+uid=".$userID);
            exit();
        }
        else{
            $sql = "INSERT INTO answers(ansDate, ansText, qID, userID) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                $error = mysqli_error($conn);
                header("Location: ../home.php?error=sqlError+error=".$error);
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ssii", $date, $answer, $qID, $userID);
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