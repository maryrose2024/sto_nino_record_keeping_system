<?php
    session_start();
    $title = "dashboard";
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/scripts.php';

?>

<?php
function fetchData($conn, $table) {
    $query = "SELECT * FROM $table"; // Use the provided table name
    $result = $conn->query($query);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

// Establish a database connection
$conn = new mysqli("localhost", "root", "", "stoninodb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$communionData = fetchData($conn, 'communion'); 

if (isset($_GET['id'])) {
    $recordId = intval($_GET['id']);
    $query = "SELECT * FROM communion WHERE id = $recordId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $communionRecord = $result->fetch_assoc();
    } else {
        echo "Record not found.";
    }
}

// Close the database connection
$conn->close();
?>

<!-- Main Content -->
<div class="col-12 col-xl-10">
    <?php include('header_nav.php');?>
    <div class="col mt-4">
        <h1 class="mb-4 text-uppercase fw-bolder">Confirmation Information</h1>
        <hr>
        <div class="row">
            <?php if (isset($_GET['id'])) { ?>
            <div class="col-12">
                <div class="card mb-3">
                    <strong>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            Client - <?php echo $communionRecord['child_name']; ?>
                            <div>
                    </strong>
                    <a href="confirmation.php" class="btn btn-primary">Back</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>ID:</td>
                            <td><?php echo $communionRecord['id']; ?></td>
                        </tr>
                        <tr>
                            <td>Record No:</td>
                            <td><?php echo $communionRecord['record_no']; ?></td>
                        </tr>
                        <tr>
                            <td>Book No:</td>
                            <td><?php echo $communionRecord['book']; ?></td>
                        </tr>
                        <tr>
                            <td>Page No:</td>
                            <td><?php echo $communionRecord['page']; ?></td>
                        </tr>
                        <tr>
                            <td>Line No:</td>
                            <td><?php echo $communionRecord['line']; ?></td>
                        </tr>
                        <tr>
                            <td>Most Rev:</td>
                            <td><?php echo $communionRecord['rev']; ?></td>
                        </tr>
                        <tr>
                            <td>Sponsor:</td>
                            <td><?php echo $communionRecord['spo']; ?></td>
                        </tr>
                        <tr>
                            <td>Child's Name:</td>
                            <td><?php echo $communionRecord['child_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Father's Name:</td>
                            <td><?php echo $communionRecord['father_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Mother's Name:</td>
                            <td><?php echo $communionRecord['mother_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Baptism:</td>
                            <td><?php echo $communionRecord['date_of_baptism']; ?></td>
                        </tr>
                        <tr>
                            <td>Place of Baptism:</td>
                            <td><?php echo $communionRecord['place_of_baptism']; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Communion:</td>
                            <td><?php echo $communionRecord['date_of_communion']; ?></td>
                        </tr>

                        <tr>
                            <td>Minister's Name:</td>
                            <td><?php echo $communionRecord['minister_name']; ?></td>
                        </tr>
                        <!-- Add more fields as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
</div>


<script>
function generatePDF(memberId) {
    // Pass the member's ID to the PDF generation script
    window.open('generate_pdf.php?id=' + memberId, '_blank');
}
</script>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</body>

<script>
document.getElementById("searchInput").addEventListener("input", function() {
    const searchText = this.value.toLowerCase();
    const tableRows = document.querySelectorAll(".table tbody tr");

    // Loop through table rows to show/hide based on search input
    tableRows.forEach(row => {
        const rowData = row.textContent.toLowerCase();
        if (rowData.includes(searchText)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});
</script>

</html>