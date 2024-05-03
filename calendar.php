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


                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-800 large">Mary Rose</span>
                        <img class="img-profile rounded-circle mr-2" src="img/logo.png">
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
                $sql = "SELECT `id`, `name`, `datetime`, `priest`, `client_name`, `timestamp` FROM `schedule`";
                $result = mysqli_query($conn, $sql);
                
                // Initialize an array to store appointments
                $appointments = [];
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $appointments[] = $row;
                    }
                }
            ?>
        <div class="col-12 col-xl-12">
            <div class="col mt-4">
                <h1 class="mb-2 text-uppercase fw-bolder">Event Calendar</h1>
                <hr>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#addScheduleModal">
                    Add Schedule
                </button>


                </ul>
            </div>
            <div style="background-color: white; text-decoration:black;" class="col-md-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- Modal for event details, edit, and delete -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Event Name:</p>
                    <h2 id="eventName"></h2>
                    <p>Location (Pamayanan):</p>
                    <h2 id="eventPlace"></h2>
                    <p>Date & Time:</p>
                    <h2 id="eventTime"></h2>
                    <!-- Add the following lines to display the priest and client_name -->
                    <p>Priest:</p>
                    <h2 id="eventPriest"></h2>
                    <p>Client Name:</p>
                    <h2 id="eventClientName"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editEventButton">Edit</button>
                    <button type="button" class="btn btn-danger" id="deleteEventButton">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding a schedule -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="addScheduleModalLabel">Add Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addScheduleForm" method="POST" action="">
                        <div class="mb-3">
                            <label for="status" class="form-label">Event Name</label>
                            <select class="form-select" id="event_name" name="event_name" required>
                                <option value="Mass">Mass (Misa)</option>
                                <option value="Blessing">Blessing</option>
                                <option value="Christening">Christening (Binyag)</option>
                                <option value="Communion">Communion (Komunyon)</option>
                                <option value="Confirmation">Confirmation (Kumpil)</option>
                                <option value="Wedding">Wedding (Kasal)</option>
                                <option value="Conversion">Conversion (Konbersiyon)</option>
                                <option value="Funeral">Funeral (Libing)</option>
                            </select>
                        </div>
                        <?php
                            $sql = "SELECT brgy FROM address"; 
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo '<div class="mb-3">';
                                echo '<label for="eventplace" class="form-label">Location (Pamayanan)</label>';
                                echo '<select class="form-select" id="address" name="address" required>';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['brgy'] . '">' . $row['brgy'] . '</option>';
                                }
                                echo '</select>';
                                echo '</div>';
                            } else {
                                echo "No addresses found in the database.";
                            }
                        ?>
                        <div class="mb-3">
                            <label for="datetime" class="form-label">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                        </div>

                        <?php
                            $query = "SELECT first_name, middle_name, last_name FROM priest";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                echo '<div class="mb-3">';
                                echo '<label for="priest" class="form-label">Priest</label>';
                                echo '<select class="form-select" id="priest" name="priest" required>';

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $formatted_name = 'Fr. ' . $row['first_name'] . ' ' . substr($row['middle_name'], 0, 1) . '. ' . $row['last_name'];
                                    echo '<option value="' . $formatted_name . '">' . $formatted_name . '</option>';
                                }

                                echo '</select>';
                                echo '</div>';
                            } else {
                                echo 'Error fetching data from the database';
                            }
                        ?>

                        <div class="mb-3">
                            <label for="client_name" class="form-label">Client Name</label>
                            <input type="text" class="form-control" id="client_name" name="client_name" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addSchedule">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for event details, edit, and delete -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Event Name:</p>
                    <h2 id="eventName"></h2>
                    <p>Date & Time:</p>
                    <h2 id="eventTime"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editEventButton">Edit</button>
                    <button type="button" class="btn btn-danger" id="deleteEventButton">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- backend: inserting_new_schedules -->
<?php

    include 'connect.php';

    if (isset($_POST['addSchedule'])) {
        $user_id = $_SESSION['user_id'];
        $event_name = $_POST['event_name'];
        $client_name = $_POST['client_name'];
        $address = $_POST['address'];
        $datetime = $_POST['datetime'];

        list($date, $time) = explode('T', $datetime);
        $time = date("h:i A", strtotime($time));

        $timestamp = strtotime($datetime);
        $date = date('Y-m-d', $timestamp);
        $time = date('H:i', $timestamp); 
        $ampm = date('A', $timestamp); 
        $time = $time . ' ' . $ampm;

        $priest = $_POST['priest']; 
        $clientName = $_POST['clientname']; 

        $sql = "INSERT INTO `schedules` (`event_name`, `priest`, `client_name`, `added_by`,`address`, `date`, `time`) 
                VALUES ('$event_name', '$priest', '$client_name', '$user_id', '$address', '$date', '$time')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New Schedule added successfully.'); window.location.href='schedules.php';</script>";
        } else {
            echo "<script>alert('Error adding new Schedule'); window.location.href='schedules.php';</script>";
        }
    }

?>


</body>

<script>
$(document).ready(function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: {
            url: 'schedules_appointment.php',
            method: 'POST'
        },
        eventClick: function(info) {
            var event = info.event;
            var modal = new bootstrap.Modal($('#eventModal'), {
                keyboard: true
            });

            if (event) {
                // Display event details in the modal
                $('#eventTitle').html(event.title);
                $('#eventName').html(event.title);
                $('#eventTime').html(event.startStr);
                // Add these lines to display the priest and client_name
                $('#eventPriest').html(event.extendedProps
                    .priest); // Change 'event.priest' to the correct property name
                $('#eventClientName').html(event.extendedProps
                    .client_name); // Change 'event.client_name' to the correct property name

                // Edit button click handler
                $('#editEventButton').click(function() {
                    // Redirect to an edit page with the event ID
                    window.location.href = 'schedules_edit.php?id=' + event.id;
                });

                $('#deleteEventButton').click(function() {
                    if (confirm('Are you sure you want to delete this event?')) {
                        // Send an AJAX request to delete the event
                        $.ajax({
                            url: 'schedules_delete.php',
                            method: 'POST',
                            data: {
                                id: event.id
                            },
                            success: function(response) {
                                if (response.success) {
                                    calendar.refetchEvents();
                                    modal.hide();
                                    // Update the schedule list
                                    updateScheduleList(event.id);
                                } else {
                                    alert('Error deleting event.');
                                }
                            },
                            error: function() {
                                alert('Error deleting event.');
                            }
                        });
                    }
                });


                // Update the schedule list
                updateScheduleList(event.id);
            } else {
                $('#eventTitle').html('No Event Selected');
                $('#eventName').html('');
                $('#eventTime').html('');
            }
            modal.show();
        }

    });
    calendar.render();

    function updateScheduleList() {
        $.ajax({
            url: 'schedules_list.php', // Replace with your script URL
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var scheduleList = $('#scheduleList');

                // Clear the existing list
                scheduleList.empty();

                // Loop through the schedule data and populate the list
                $.each(response, function(index, schedule) {
                    var listItem = $('<li>').html('<strong>' + schedule.eventName +
                        ':</strong> ' + schedule.datetime);
                    scheduleList.append(listItem);
                });
            },
        });
    }

    // Call the function to populate the schedule list on page load
    updateScheduleList();
});
</script>


</html>