<?php
    include 'connect.php';

    if(isset($_POST['editAdmin'])) {
        $id = $_POST['admin_id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "UPDATE account SET fullname = ?, username = ?, password = ? WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $fullname, $username, $password, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Edit Admin successfully'); window.location.href='account.php';</script>";
        } else {
            echo "<script>alert('Edit Admin not successfully'); window.location.href='account.php';</script>";
        }
    }
?>