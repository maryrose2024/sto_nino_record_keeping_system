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
    } elseif ($action == 'get_donation_amounts_by_month') {
        echo getDonationAmountsByMonth($conn);
    } elseif ($action == 'get_total_sched_based_on_event') { 
        echo getTotalSchedBasedOnEvent($conn); 
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


function getDonationAmountsByMonth($conn) {
    $response = array(); 
    $query = "SELECT MONTH(payment_date) AS month, SUM(amount) AS total_amount 
            FROM payments 
            GROUP BY MONTH(payment_date)";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $donation_amounts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            // Convert the numeric month to the corresponding word
            $month_word = date("F", mktime(0, 0, 0, $row['month'], 1));
            $donation_amounts[$month_word] = $row['total_amount'];
        }
        $response['status'] = "success";
        $response['donation_amounts'] = $donation_amounts;
    } else {
        $response['status'] = "error";
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    return json_encode($response);
}


function getTotalSchedBasedOnEvent($conn) {
    $response = array(); 
    $query = "SELECT event_name, COUNT(*) AS total_schedules
              FROM schedules
              GROUP BY event_name";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        $schedule_counts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $schedule_counts[$row['event_name']] = $row['total_schedules'];
        }
        $response['status'] = "success";
        $response['schedule_counts'] = $schedule_counts;
    } else {
        $response['status'] = "error";
        $response['message'] = "Error: " . mysqli_error($conn);
    }
    return json_encode($response);
}
