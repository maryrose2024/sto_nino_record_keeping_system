<?php
    session_start();
    $title = "dashboard";
    include 'connect.php';
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/scripts.php';

?>


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
                <input class="form-control" type="text" id="searchInput" placeholder="Search for...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input class="form-control" type="text" id="searchInput" placeholder="Search for...">
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


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-800 large">Mary Rose</span>
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
                function fetchData($conn, $table) {
                    $query = "SELECT * FROM $table";
                    $result = $conn->query($query);
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                    return $data;
                }
                

                // Fetch admin data using the fetchData function
                $adminData = fetchData($conn, 'account');
            ?>

            <!-- Main Content -->
            <div class="col-12 col-xl-12">
                <div class="col mt-4">
              
                    <h1 class="mb-4 text-uppercase fw-bolder">Admin Account Management</h1>
                    <hr>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addAdminModal">
                        Add Admin
                    </button>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table style="background-color: white;" class="table table-bordered solid">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($adminData as $admin) { ?>
                                        <tr>
                                            <td><?php echo $admin['id']; ?></td>
                                            <td><?php echo $admin['fullname']; ?></td>
                                            <td><?php echo $admin['username']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editadminModal<?php echo $admin['id']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="account_delete.php?id=<?php echo $admin['id']; ?>"
                                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit admin Modals -->
            <?php foreach ($adminData as $admin) { ?>
            <div class="modal fade" id="editadminModal<?= $admin['id'] ?>" tabindex="-1"
                aria-labelledby="editadminModalLabel<?= $admin['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="POST" action="account_edit.php">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bolder" id="editadminModalLabel<?= $admin['id'] ?>">Edit
                                        admin
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <input type="hidden" name="admin_id" value="<?= $admin['id'] ?>">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        value="<?= $admin['fullname'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="<?= $admin['username'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="editAdmin">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>


            <!-- Add Admin Modal -->
            <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bolder" id="addAdminModalLabel">Add Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name:</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addAdmin">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include 'connect.php';

        if(isset($_POST['addAdmin'])) {
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = md5($_POST['password']);

            // Validate inputs
            if(empty($fullname) || empty($username) || empty($_POST['password'])) {
                echo "<script>alert('Please fill in all fields.'); window.location.href='account.php';</script>";
                exit();
            }

            // Check if username already exists
            $usernameCheck = "SELECT * FROM `account` WHERE `username` = '$username'";
            $result = $conn->query($usernameCheck);
            if($result->num_rows > 0) {
                echo "<script>alert('Username already exists.'); window.location.href='account.php';</script>";
                exit();
            }

            // Use a more secure password hashing method like password_hash
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert query
            $sql = "INSERT INTO `account` (`fullname`, `username`, `password`, `timestamp`, `usertype`) VALUES ('$fullname', '$username', '$hashedPassword', NOW(), 'Admin')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New Admin added successfully.'); window.location.href='account.php';</script>";
            } else {
                echo "<script>alert('Error adding new admin'); window.location.href='account.php';</script>";
            }
        }
    ?>


</body>

</html>