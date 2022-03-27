<div class="wrapper">
    <div>
        
        <?php 
            echo $_SESSION['userType']."</br></br>";
            require "infobar.php"; 
        ?>
        <h3>Get your all burning fitness questions answered by a fitness pro</h3>						
        <form action="scripts/post_question.php" method="post">
        <label>Question:</label>
			<br/><br/>
			<textarea type="text" name="question" placeholder="Write something..." style="height:100px; resize:none;"></textarea>
            <br/><hr>
            <input class="btn" type="submit" name="submit" value="Submit">
        </form>
        <br/><br/>
        <label>Answers</label>
        <br/><br/>
        <div class="answer">
            <div>
                <?php
                    require "scripts/dbconn.script.php";

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

                            $sqla = "SELECT ansID, ansDate, ansText, qID, userID FROM answers WHERE qID = $row[qID] ORDER BY ansDate DESC";
                            $resulta = $conn->query($sqla);
                            if(!$resulta){
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
                                                <form  height auto;\" method=\"post\" action=\"scripts/delete.php?action=delete&id=".$row['qID']." \">
                                                    <button type=\"submit\" name=\"delete\" class=\"btn\" value=\"submit\" style=\"margin-top:5px; float: right;\">Delete</button>
                                                </form>
                                        </div>";
                                    if($resulta->num_rows > 0 ){
                                        while($rowa = $resulta->fetch_assoc()) {
                                            $sqlb = "SELECT username FROM users WHERE userID = $rowa[userID]";
                                            $resultb = $conn->query($sqlb);
                                            if(!$resultb){
                                                die($conn->error);
                                            }

                                            if($resultb->num_rows > 0 ){
                                                while($rowb = $resultb->fetch_assoc()) {
                                                    echo "  
                                                        <div class=\"article-card\"> 
                                                            <div class=\"qid\">
                                                                <p>".$rowb["username"]."</p>
                                                                <p style=\"float: right;\">".$rowa['ansDate']."</p>
                                                            </div>
                                                            <p align=\"left\">".$rowa['ansText']."</p>
                                                        </div>
                                                    </div>";
                                                }
                                            }
                                            else{
                                                echo "System Error: Error matching expert to answer";
                                            }
                                        }
                                    }
                                    else{
                                        echo "  
                                        <div class=\"article-card\"> 
                                            <div class=\"qid\">
                                                <p></p>
                                                <p style=\"float: right;\"></p>
                                            </div>
                                            <p align=\"left\">No answer yet</p>
                                        </div>
                                    </div>";
                                    }
                                }
                            }
                            else{
                                echo "System error: error matching user to question";
                            }
                            
                        }
                    }
                    else{
                        echo "0 Answers found";
                    }

                ?>
            </div>
        </div>
    </div>

    <div class="top-ad"><div class="ad"><p>ad space</p></div></div>
    
</div>