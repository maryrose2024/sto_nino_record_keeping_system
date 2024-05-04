<?php
include("connect.php");

if(isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'get_total_schedules') {
        echo totalSchedules($conn);
    } elseif ($action == 'get_total_payments') {
        echo totalPayments($conn);
    } elseif ($action == 'get_total_admin_accounts') {
        echo totalAdminAccounts($conn);
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid action.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Action parameter missing.'));
}
function totalSchedules($conn) {
    $response = array(); 
    $query = "SELECT COUNT(*) AS num_rows FROM schedules WHERE is_done = 0";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $response['status'] = "success";
        $response['total_schedules'] = $row['num_rows'];
    } else {
        $response['status'] = "error";
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    return json_encode($response);
}

function totalPayments($conn) {
    $response = array();
    $query = "SELECT SUM(amount) AS total_amount FROM payments";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $response['status'] = "success";
        $response['total_payments'] = $row['total_amount'];
    } else {
        $response['status'] = "error";
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    return json_encode($response);
}

function totalAdminAccounts($conn) {
    $response = array(); 
    $query = "SELECT COUNT(*) AS num_admins FROM account WHERE usertype = 'Admin'";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $response['status'] = "success";
        $response['total_admin_accounts'] = $row['num_admins'];
    } else {
        $response['status'] = "error";
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    return json_encode($response);
}
