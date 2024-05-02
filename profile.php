<?php
    session_start();
    $title = "dashboard";
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/scripts.php';

?>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-12 col-xl-2"></div>
            
        </div>
        
<!-- Content Wrapper -->

<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
             <!-- Nav Item - User Information -->
             <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 large">Mary Rose</span>
                    <img class="img-profile rounded-circle mr-2"
                        src="img/logo.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-500"></i>
                        Profile
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
        

<?php
                $username = $_SESSION['username'];

                function fetchUserData($conn, $table, $username) {
                    $query = "SELECT * FROM $table WHERE username = '$username'";
                    $result = $conn->query($query);
                    return $result->fetch_assoc();
                }

                // Fetch user data using the fetchUserData function
                $userData = fetchUserData($conn, 'account', $username);
            ?>

            <!-- Main Content -->
            <div class="col-12 col-xl-12">
                <div class="col mt-4">
                    <h1 class="mb-2 text-uppercase fw-bolder">Profile</h1>
                    <hr>
    

                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table style="background-color: white;" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Full Name</th>
                                            <td><?php echo $userData['fullname']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td><?php echo $userData['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>User Type</th>
                                            <td><?php echo $userData['usertype']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Timestamp</th>
                                            <td><?php echo $userData['timestamp']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>