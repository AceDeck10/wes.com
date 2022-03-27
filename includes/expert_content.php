<div class="wrapper">
    <div>
        <?php 
            echo $_SESSION['userType']."</br></br>";
            require "infobar.php"; 
        ?>  
        <h3>Welcome to the experts conner</h3>
        <?php
            require "scripts/dbconn.script.php";

            //$date = date('Y/m/d');
            
            $sql = "SELECT qID, qDate, qText, userID FROM questions ORDER BY qDate DESC";
            $result = $conn->query($sql);
            if(!$result){
                die($conn->error);
            }
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT username FROM users WHERE userID = $row[userID]";
                    $result2 = $conn->query($sql2);
                    if(!$result2){
                        die($conn->error);
                    }

                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                            echo "
                                <div style=\"border: 1px solid black; height: auto; margin: 25px;\">
                                    <div class=\"article-card\">
                                            <div class=\"qid\">
                                                <p>".$row2["username"]."</p> 
                                                <p style=\"float: right;\">".$row["qDate"]."</p>
                                            </div>
                                            <p align=\"left\">".$row["qText"]."</p>
                                </div>";
                            $sql3 = "SELECT qID FROM Answers WHERE qID = $row[qID]";
                            $result3 = $conn->query($sql3);
                            if(!$result3){
                                die($conn->error);
                            }

                            if ($result3->num_rows > 0) {
                                echo "
                                    <div class=\"article-card\"> 
                                        <div class=\"qid\">
                                            <p>".$_SESSION['username']."</p>
                                        </div>
                                        <p>Answer Already provided</p>
                                    </div>
                                </div>";
                            }
                            else{
                                echo "
                                    <div class=\"article-card\"> 
                                        <div class=\"qid\">
                                            <p>".$_SESSION['username']."</p>
                                            <p style=\"float: right;\">".date('Y/m/d')."</p>
                                        </div>
                                        <form  height auto;\" method=\"post\" action=\"scripts/answer.php?action=answer&id=".$row['qID']." \">
                                            <textarea type=\"text\" name=\"answer\" placeholder=\"Write something...\" style=\"height:50px; resize:none;\"></textarea>
                                            <button type=\"submit\" name=\"submit\" class=\"btn\" value=\"submit\" style=\"margin-top:5px; float: right;\">Answer</button>
                                        </form>
                                    </div>
                                </div>";
                            }
                        }
                    }
                    
                }
            }
            else{
                echo "0 Questions found";
            }

        ?>						
    </div>

    <div class="top-ad"><div class="ad"><p>ad space</p></div></div>
    
</div>