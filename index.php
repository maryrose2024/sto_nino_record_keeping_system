<?php 


include('auth_guard.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include 'header_nav.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h1 mb-0 text-gray-600 fw-bolder">DASHBOARD</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Schedule -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="schedules.php" class="active">
                                            
                                            <div class="h5 text-large font-weight-bold text-primary text-uppercase mb-3">Schedule</div></a>
                                            <div class="h4 mb-0 font-weight-bold text-gray-600">
                                                <p id="total_sched_val"></p>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-calendar-alt fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sacraments -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="sacraments.php" class="active">
                                            <div class="h5 text-large font-weight-bold text-success text-uppercase mb-3">Sacraments</div></a>
                                            <div class="h4 mb-0 font-weight-bold text-gray-600">7</div>
                                        </div>
                                        <div class="col-auto">
                                                <i class="fas fa-church fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Donation -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="donation.php" class="active">
                                            <div class="h5 text-large font-weight-bold text-info text-uppercase mb-3">Donation </div></a>
                                            <div class="h4 mb-0 font-weight-bold text-gray-600">
                                                <p id="total_payments_val"></p>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-coins fa-3x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="account.php" class="active">
                                            <div class="h5 text-large font-weight-bold text-warning text-uppercase mb-3"> Admin Account</div></a>
                                            <div class="h4 mb-0 font-weight-bold text-gray-600">
                                                <p id="total_admin_accounts"></p>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-alt fa-3x text-gray-400"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">NUMBER OF CLIENTS</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">RECORD OF SACRAMENTS</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Baptism
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Confirmation
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Marriage
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Conversion
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Death
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            
    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>

    <script>
        $(document).ready(function(){
            function getTotalSchedules() {
                $.ajax({
                    url: 'dashboard_data.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'get_total_schedules'
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.status === 'success') {
                            $('#total_sched_val').text(response.total_schedules);
                        } else {
                            $('#total_sched_val').text('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            }
            function getTotalPayments() {
                $.ajax({
                    url: 'dashboard_data.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'get_total_payments'
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.status === 'success') {
                            var totalPayments = parseFloat(response.total_payments);
                            var formattedPayments = new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalPayments);

                            $('#total_payments_val').text(formattedPayments);
                        } else {
                            $('#total_payments_val').text('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            }
            function getTotalAdminAccounts() {
                $.ajax({
                    url: 'dashboard_data.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'get_total_admin_accounts'
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.status === 'success') {
                            $('#total_admin_accounts').text(response.total_admin_accounts);
                        } else {
                            $('#total_admin_accounts').text('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            }

            getTotalSchedules();
            getTotalPayments();
            getTotalAdminAccounts();

        });
    </script>