<?php
    if (isset($_POST['submit'])){
        session_start();
        require "dbconn.script.php";

        $author = $_POST['author'];
        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y/m/d');
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $image = $_POST['image'];
        $article = $_POST['article'];
        $userID = $_SESSION['userID'];

        //echo $author.$date.$title.$subtitle.$image.$article.$userID;

        if(empty( $author) || empty($date) || empty($title) || empty($image) || empty($article) || empty($userID)){
            header("Location: ../adminHome.php?error=invalidData+emptyFields");
		    exit();
        }
        else{
            $sql = "INSERT INTO articles(articleAuthor, articleDate, articleTitle, articleSubtitle, articleImage, articleText, userID) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                $error = mysqli_error($conn);
                header("Location: ../adminHome.php?error=sqlError+error=".$error);
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ssssssi", $author, $date, $title, $subtitle, $image, $article, $userID);
                mysqli_stmt_execute($stmt);
                header("Location: ../adminHome.php?post=success");
                exit();
            }
            
            $conn->close();
        }
    }
    else{
        header("Location: ../adminHome.php");
		exit();
    }
?>
