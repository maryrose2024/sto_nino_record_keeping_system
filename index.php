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
                        <div class="col-xl-4 col-md-6 mb-4">
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
                        <!-- <div class="col-xl-4 col-md-6 mb-4">
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
                        </div> -->

                        <!-- Donation -->
                        <div class="col-xl-4 col-md-6 mb-4">
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
                        <div class="col-xl-4 col-md-6 mb-4">
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
                                    <h6 class="m-0 font-weight-bold text-primary">DONATION</h6>
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
                                        <canvas id="donationChart"></canvas>
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
                                    <h6 class="m-0 font-weight-bold text-primary">SCHEDULES</h6>
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
                                    <!-- <div class="mt-4 text-center small">
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
                                    </div> -->
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

    <script>
        function getDonationAmountsByMonth() {
            $.ajax({
                url: 'dashboard_data.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'get_donation_amounts_by_month'
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        var months = Object.keys(response.donation_amounts);
                        var amounts = Object.values(response.donation_amounts);
                    
                        updateAreaChart(months, amounts);
                    } else {
                        console.log('Error fetching donation amounts by month:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        };
        getDonationAmountsByMonth();
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        function updateAreaChart(months, amounts) {
            var ctx = document.getElementById("donationChart");
            var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: amounts,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
                },
                scales: {
                xAxes: [{
                    time: {
                    unit: 'date'
                    },
                    gridLines: {
                    display: false,
                    drawBorder: false
                    },
                    ticks: {
                    maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                    maxTicksLimit: 5,
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return '₱' + number_format(value);
                    }
                    },
                    gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                    }
                }],
                },
                legend: {
                display: false
                },
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
                    }
                }
                }
            }
            });
         };


    </script>

    <script>
         function getTotalSchedBasedOnEvent() {
            $.ajax({
                url: 'dashboard_data.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'get_total_sched_based_on_event'
                },
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        var events = Object.keys(response.schedule_counts);
                        var counts = Object.values(response.schedule_counts);
                        
                        updateDonutChart(events, counts);
                    } else {
                        console.log('Error fetching total schedules by event:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        }

        // Call the function to fetch total schedules based on event
        getTotalSchedBasedOnEvent();

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function updateDonutChart(events, counts) {
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: events,
                    datasets: [{
                        data: counts,
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796'],
                        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#b72e26', '#6b6a6a'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    cutoutPercentage: 80,
                },
            });
        }

    </script>