<?php
session_start(); 
$connection = mysqli_connect('localhost', '76966621', 'Password123', 'db_76966621');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$user = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['postTitle'];
    $postCon =$_POST['postContent'];
    $community = $_POST['postCom'];
    $accountIdQuery = "SELECT id FROM Account WHERE username = '$user'";
    $accountIdResult = mysqli_query($connection, $accountIdQuery);
    if ($accountIdRow = mysqli_fetch_assoc($accountIdResult)) {
        $accountId = $accountIdRow['id'];
        $comIdQuery = "SELECT com_id FROM communities WHERE name = ?";
        if ($comIdQ = mysqli_prepare($connection, $comIdQuery)) {
            $comIdQ = mysqli_bind_param("s", $community);
            $comIdQ = mysqli_stmt_execute($comIdQ);
            $result = mysqli_stmt_get_result($comIdQ);
            if ($row = mysqli_fetch_assoc($result)) {
                $comId = $row['com_id'];
                $insertQuery = "INSERT INTO thread (title, com_id, account_id, thread_like, thread_dislike, content) VALUES (?, ?, ?, 0, 0, ?)";
                if ($insertStmt = mysqli_prepare($connection,$insertQuery)) {
                    $insertStmt = mysqli_bind_param("siis", $title, $comId, $accountId, $postCon);
                    $insertStmt = mysqli_stmt_execute($insertStmt);
                    if (mysqli_affected_rows($connection) > 0) {
                        $newThreadId = mysqli_insert_id($connection);
                        header("Location: PostPage.php?thread_id=$newThreadId");
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }
                }
            } else {
                echo "Community not found.";
            }
        } else {
            echo "Error preparing community ID query: " . mysqli_error($connection);
        }
    } else {
        echo "Account not found.";
    }
}

?> 