<?php
session_start();
include 'db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: auth-login.php");
    exit;
}

// Fetch all feedbacks
$query = "SELECT * FROM feedback ORDER BY created_at DESC"; // Adjust the query to your table name
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <?php $title = "Feedbacks";
    include 'partials/title-meta.php'; ?>

    <?php include 'partials/head-css.php'; ?>

</head>

<?php include 'partials/body.php'; ?>

<!-- Begin page -->
<div id="app-layout">

    <?php $pagetitle = "Dashboard";
    include 'partials/menu.php';  ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Feedbacks</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                            <i data-feather="crosshair" class="widgets-icons"></i>
                                        </div>
                                        <h5 class="card-title mb-0">Feedbacks</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <!-- Search Icon -->
                                        <div class="input-group me-2">
                                            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                                            <span class="input-group-text"><i class="mdi mdi-magnify"></i></span>
                                        </div>
                                        <div class="me-2">
                                            <input type="text" id="dateRange" class="form-control" placeholder="Select Date">
                                        </div>
                                        <!-- Sorting Dropdown -->
                                        <div>
                                            <select id="sortOptions" class="form-select">
                                                <option value="">Sort by</option>
                                                <option value="rating_3">Rating: 3 Star</option>
                                                <option value="rating_2">Rating: 2 Star</option>
                                                <option value="rating_1">Rating: 1 Star</option>
                                                <option value="name_asc">Name: A-Z</option>
                                                <option value="name_desc">Name: Z-A</option>
                                                <option value="contact_asc">Contact: Ascending</option>
                                                <option value="contact_desc">Contact: Descending</option>
                                                <option value="date_asc">Date: Oldest</option>
                                                <option value="date_desc">Date: Newest</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-traffic mb-0">

                                                <thead>
                                                    <tr>
                                                        <th>SR</th>
                                                        <th>Rating</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Feedback</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th colspan="2">Preview</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($result->num_rows > 0): ?>
                                                        <?php $sl_no = 1; // Serial number counter 
                                                        ?>
                                                        <?php while ($row = $result->fetch_assoc()): ?>
                                                            <tr>
                                                                <td><?php echo $sl_no++; ?></td>
                                                                <td>
                                                                    <?php
                                                                    $rating = (int)$row['rating']; // Cast rating to integer
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $rating) {
                                                                            echo '<i class="mdi mdi-star text-warning"></i>'; // Filled star
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                                                <td><?php echo htmlspecialchars($row['contact']); ?></td>
                                                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                                <td>
                                                                    <div style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                                        <?php echo nl2br(htmlspecialchars($row['feedback'])); ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    // Convert the created_at to DateTime object
                                                                    $date = new DateTime($row['created_at']);
                                                                    echo $date->format('d M, y');
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    // Display time in 12-hour format with AM/PM
                                                                    echo $date->format('h:i A');
                                                                    ?>
                                                                </td>

                                                                <td>
                                                                    <a href="#" class="eye-icon" data-bs-toggle="modal" data-bs-target="#feedbackModal-<?php echo $row['id']; ?>">
                                                                        <i class="mdi mdi-eye text-muted fs-18 p-3 me-1"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <!-- Enhanced Modal for Full Feedback -->
                                                            <div class="modal fade" id="feedbackModal-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="feedbackModalLabel-<?php echo $row['id']; ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Centered and larger modal -->
                                                                    <div class="modal-content shadow-lg rounded">
                                                                        <div class="modal-header bg-light text-white">
                                                                            <h5 class="modal-title text-black" id="feedbackModalLabel-<?php echo $row['id']; ?>">
                                                                                Feedback Details
                                                                            </h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body p-4" style="max-height: 400px; overflow-y: auto;">
                                                                            <div class="d-flex align-items-center mb-3">
                                                                                <p class="m-0"><strong>Rating:</strong></p>
                                                                                <div class="ms-2">
                                                                                    <?php
                                                                                    $rating = (int)$row['rating'];
                                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                                        if ($i <= $rating) {
                                                                                            echo '<i class="mdi mdi-star text-warning fs-5"></i>'; // Filled star
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
                                                                            <p><strong>Contact:</strong> <?php echo htmlspecialchars($row['contact']); ?></p>
                                                                            <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                                                                            <p><strong>Feedback:</strong></p>
                                                                            <div class="border rounded p-3 bg-light">
                                                                                <?php echo nl2br(htmlspecialchars($row['feedback'])); ?>
                                                                            </div>
                                                                            <p class="mt-3"><strong>Date:</strong>
                                                                                <?php
                                                                                // Convert the created_at to DateTime object
                                                                                $date = new DateTime($row['created_at']);
                                                                                echo $date->format('d M, y');
                                                                                ?>
                                                                            </p>
                                                                            <p class="mt-3"><strong>Time:</strong>
                                                                                <?php
                                                                                // Display time in 12-hour format with AM/PM
                                                                                echo $date->format('h:i A');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="modal-footer bg-light">
                                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endwhile; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center">No feedback submitted yet.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                <?php include 'partials/footer.php'; ?>

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>
        <!-- App js-->
        <script src="assets/js/app.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const sortOptions = document.getElementById('sortOptions');
                const dateRangeInput = document.getElementById('dateRange');
                const tableBody = document.querySelector('table tbody');

                // Initialize the date range picker using flatpickr
                flatpickr(dateRangeInput, {
                    mode: "range", // Enable range mode
                    dateFormat: "Y-m-d", // Format for date
                    onChange: function(selectedDates, dateStr, instance) {
                        // Filter the table rows based on the selected date range
                        filterTable(selectedDates);
                    }
                });

                // Handle search functionality
                searchInput.addEventListener('input', function() {
                    filterTable();
                });

                // Handle sorting functionality
                sortOptions.addEventListener('change', function() {
                    sortTable();
                });

                // Filter table rows based on search input and selected date range
                function filterTable(selectedDates = null) {
                    const searchTerm = searchInput.value.toLowerCase();
                    const startDate = selectedDates ? selectedDates[0] : ''; // Get the start date from flatpickr
                    const endDate = selectedDates && selectedDates[1] ? selectedDates[1] : ''; // Get the end date

                    Array.from(tableBody.rows).forEach(row => {
                        const cells = Array.from(row.cells).map(cell => cell.textContent.toLowerCase());
                        const feedbackDate = row.cells[6].textContent.trim(); // Assuming the date is in the 7th column (index 6)

                        // Check if the row matches the search term
                        const matchesSearch = cells.some(cell => cell.includes(searchTerm));

                        // Check if the row matches the date range
                        const matchesDateRange = (startDate === '' || new Date(feedbackDate) >= new Date(startDate)) &&
                            (endDate === '' || new Date(feedbackDate) <= new Date(endDate));

                        // Show or hide the row based on search and date filter
                        row.style.display = (matchesSearch && matchesDateRange) ? '' : 'none';
                    });
                }

                // Sorting function
                function sortTable() {
                    const sortValue = sortOptions.value;
                    const rows = Array.from(tableBody.rows);

                    rows.sort((a, b) => {
                        const getValue = (row, index) => row.cells[index].textContent.trim();
                        let comparison = 0;

                        switch (sortValue) {
                            case 'rating_3':
                            case 'rating_2':
                            case 'rating_1':
                                const targetRating = parseInt(sortValue.split('_')[1], 10);
                                comparison =
                                    (b.cells[1].querySelectorAll('.mdi-star').length === targetRating ? 1 : 0) -
                                    (a.cells[1].querySelectorAll('.mdi-star').length === targetRating ? 1 : 0) ||
                                    b.cells[1].querySelectorAll('.mdi-star').length - a.cells[1].querySelectorAll('.mdi-star').length;
                                break;
                            case 'name_asc':
                                comparison = getValue(a, 2).localeCompare(getValue(b, 2));
                                break;
                            case 'name_desc':
                                comparison = getValue(b, 2).localeCompare(getValue(a, 2));
                                break;
                            case 'contact_asc':
                                comparison = getValue(a, 3).localeCompare(getValue(b, 3));
                                break;
                            case 'contact_desc':
                                comparison = getValue(b, 3).localeCompare(getValue(a, 3));
                                break;
                            case 'date_asc':
                                comparison = new Date(getValue(a, 6)) - new Date(getValue(b, 6));
                                break;
                            case 'date_desc':
                                comparison = new Date(getValue(b, 6)) - new Date(getValue(a, 6));
                                break;
                            default:
                                break;
                        }
                        return comparison;
                    });

                    // Reorder rows based on sorted comparison
                    rows.forEach(row => tableBody.appendChild(row));
                }
            });
        </script>
        </body>

</html>