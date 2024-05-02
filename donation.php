<?php
    session_start();
    $title = "dashboard";
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

        <!-- Topbar Search Display Only-->
        <input class="form-control" type="text" placeholder="                                                                                  
        Sto. Niño Parish Record-Keeping Information System" aria-label="Disabled input example" disabled readonly>

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
                function fetchData($conn, $table) {
                    $query = "SELECT * FROM $table";
                    $result = $conn->query($query);
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                    return $data;
                }

                $paymentsData = fetchData($conn, 'payments');
            ?>

            <!-- Main Content -->
            <div class="col-12 col-xl-12">
                <div class="col mt-4">
                    <h1 class="mb-4 text-uppercase fw-bolder">Donation</h1>
                    <hr>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addPaymentsModal">
                        Add Donation
                    </button>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table style="background-color: white" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fullname</th>
                                            <th>Address</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Contributions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paymentsData as $payment) { ?>
                                        <tr>
                                            <td><?php echo $payment['id']; ?></td>
                                            <td><?php echo $payment['fullname']; ?></td>
                                            <td><?php echo $payment['address']; ?></td>
                                            <td><?php echo $payment['amount']; ?></td>
                                            <td><?php echo $payment['payment_date']; ?></td>
                                            <td><?php echo $payment['contributions']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editPaymentModal<?php echo $payment['id']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                        
                                                    <button type="button" class="btn btn-secondary" onclick="generatePDF(<?php echo $payment['id']; ?>)">
                
<i class="fas fa-print"></i>
            </button>
                                                 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <script>
function generatePDF(paymentId) {
    // Open a new window to trigger the PDF generation script
    window.open('generate_paymentpdf.php?payment_id=' + paymentId, '_blank');
}
</script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Edit Payment Modals -->
                        <?php foreach ($paymentsData as $payment) { ?>
                        <div class="modal fade" id="editPaymentModal<?= $payment['id'] ?>" tabindex="-1"
                            aria-labelledby="editPaymentModalLabel<?= $payment['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form method="POST" action="payment_edit.php">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPaymentModalLabel<?= $payment['id'] ?>">
                                                    Edit Donation
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <input type="hidden" name="payment_id" value="<?= $payment['id'] ?>">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name:</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname"
                                                    value="<?= $payment['fullname'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address:</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="<?= $payment['address'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount:</label>
                                                <input type="number" class="form-control" id="amount" name="amount"
                                                    value="<?= $payment['amount'] ?>" step="0.01" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment_date" class="form-label">Date:</label>
                                                <input type="date" class="form-control" id="payment_date"
                                                    name="payment_date" value="<?= $payment['payment_date'] ?>"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contributions" class="form-label">Contributions:</label>
                                                <input type="text" class="form-control" id="contributions"
                                                    name="contributions" value="<?= $payment['contributions'] ?>"
                                                    required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="editPayment">Save
                                            Changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Add Payments Modal -->
                        <div class="modal fade" id="addPaymentsModal" tabindex="-1"
                            aria-labelledby="addPaymentsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bolder" id="addPaymentsModalLabel">Add Donation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name:</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address:</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount:</label>
                                                <input type="number" class="form-control" id="amount" name="amount"
                                                    step="0.01" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment_date" class="form-label">Payment Date:</label>
                                                <input type="date" class="form-control" id="payment_date"
                                                    name="payment_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contributions" class="form-label">Contributions:</label>
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option value="Married">Mass /Misa</option>
                                                        <option value="Married">Blessing</option>
                                                        <option value="Single">Christening /Binyag</option>
                                                        <option value="Married">Communion /Komunyon</option>
                                                        <option value="Married">Confirmation /Kumpil</option>
                                                        <option value="Married">Marriage /Kasal</option>
                                                        <option value="Married">Conversion /Konbersiyon</option>
                                                        <option value="Married">Funeral /Libing</option>
                                                    </select>
                                                
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="addPayments">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    if (isset($_POST['addPayments'])) {
                        $fullname = $_POST['fullname'];
                        $address = $_POST['address'];
                        $amount = $_POST['amount'];
                        $paymentDate = $_POST['payment_date'];
                        $contributions = $_POST['contributions'];

                        // Prepare the SQL statement with placeholders
                        $sql = "INSERT INTO `payments` (`fullname`, `address`, `amount`, `payment_date`, `contributions`) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssdss", $fullname, $address, $amount, $paymentDate, $contributions);

                        // Execute the statement
                        if ($stmt->execute()) {
                            echo "<script>alert('New payment added successfully.'); window.location.href='payment.php';</script>";
                        } else {
                            echo "<script>alert('Error adding new payment.'); window.location.href='payment.php';</script>";
                        }
                    }
                ?>

</body>
<!-- Include the necessary JavaScript file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


</html>