<?php
    session_start();
    if(isset($_POST['questionSubmit'])){

        if(isset($_SESSION['id'])){
            
            $title = $_POST["questionTitle"];
            $content = $_POST["questionContent"];
            $user_id = $_SESSION['id'];
    
            require_once './connectDB.php';
    
            $sql = "INSERT INTO Question (title, content, postdate, user_id) VALUES ('$title', '$content', NOW(), '$user_id')";

            if(mysqli_query($conn, $sql)){

                header("location: ../../list.php");
                mysqli_close($conn);
                exit();
            }else{
                header("location: ../../list.php?reason=cannotgetcurrentsessionid");
                mysqli_close($conn);
                exit();
            }
    
        }else{
            header("location: ../../list.php?reason=cannotgetcurrentsessionid");
            mysqli_close($conn);
            exit();
        }

    }else{
        header("location: ../../list.php?reason=cannotpostquestion");
        exit();
    }
