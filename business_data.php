<?php
include 'services/session.php'; // Ensure the session is started
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Starter";
    include 'partials/title-meta.php'; ?>
    <?php include 'partials/head-css.php'; ?>
</head>

<?php include 'partials/body.php'; ?>

<div id="app-layout">

    <?php $pagetitle = "Starter";
    include 'partials/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Feedback</h4>
                    </div>
                </div>

                <!-- Display Businesses Data -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                        <i data-feather="briefcase" class="widgets-icons"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Businesses Overview</h5>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-condensed table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Logo</th>
                                                <th>Business Name</th>
                                                <th>Email</th>
                                                <th>Contact No</th>
                                                <th>GST No</th>
                                                <th>Address</th>
                                                <th>Pincode</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Business Info</th>
                                                <th>Created_At</th>
                                                <th>Updated_At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch data from the businesses table
                                            $query = "SELECT business_name, email, contact_no, gst_no, billing_address, city, state, country, pincode, business_info, logo, created_at, updated_at FROM businesses";
                                            $result = mysqli_query($conn, $query);

                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through the results and display in table
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>
                                            <td><img src='uploads/{$row['logo']}' alt='Logo' style='width: 50px; height: 50px;'></td>
                                            <td>{$row['business_name']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['contact_no']}</td>
                                            <td>{$row['gst_no']}</td>
                                            <td>{$row['billing_address']}</td>
                                            <td>{$row['pincode']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['country']}</td>
                                            <td>{$row['business_info']}</td>                                            
                                            <td>{$row['created_at']}</td>
                                            <td>{$row['updated_at']}</td>
                                            <td>
                                                <i class='mdi mdi-pencil text-muted fs-20'></i> 
                                                <i class='mdi mdi-delete text-muted fs-20'></i>
                                            </td>

                                          </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='13' class='text-center'>No records found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php include 'partials/footer.php'; ?>


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        <script>
            // Trigger the file input when the logo image is clicked
            document.getElementById('logoImage').addEventListener('click', function() {
                document.getElementById('logoFile').click(); // Open the file input dialog
            });

            // Save toggle state in localStorage
            function toggleField(field) {
                let state = document.getElementById(field + '-toggle').checked ? 'on' : 'off';
                localStorage.setItem(field, state);

                // Toggle the field visibility
                if (state === 'on') {
                    document.getElementById(field + '-field').classList.add('hidden');
                } else {
                    document.getElementById(field + '-field').classList.remove('hidden');
                }
            }

            // On page load, set toggle state and field visibility
            window.onload = function() {
                ['name', 'contact', 'email'].forEach(field => {
                    let state = localStorage.getItem(field);

                    // Set the checkbox state from localStorage
                    if (state === 'on') {
                        document.getElementById(field + '-toggle').checked = true;
                        document.getElementById(field + '-field').classList.add('hidden'); // Hide field if "on"
                    } else {
                        document.getElementById(field + '-toggle').checked = false;
                        document.getElementById(field + '-field').classList.remove('hidden'); // Show field if "off"
                    }
                });
            };

            document.getElementById('pincode').addEventListener('input', function() {
                const pincode = this.value.trim();
                if (pincode.length === 6) { // Validate Indian pincode length
                    fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data[0].Status === 'Success') {
                                const postOffice = data[0].PostOffice[0];
                                document.getElementById('city').value = postOffice.District;
                                document.getElementById('state').value = postOffice.State;
                                document.getElementById('country').value = postOffice.Country;
                            } else {
                                alert('Invalid Pincode!');
                                document.getElementById('city').value = '';
                                document.getElementById('state').value = '';
                                document.getElementById('country').value = '';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            alert('Error fetching Pincode details.');
                        });
                } else {
                    // Clear the fields if the pincode is not valid
                    document.getElementById('city').value = '';
                    document.getElementById('state').value = '';
                    document.getElementById('country').value = '';
                }
            });

            function copyFeedbackLink() {
                const staticPart = "https://quickrate.in/feedback/";
                const businessNameInput = document.getElementById('businessName'); // Correct input field reference

                const businessName = businessNameInput.value.trim(); // Get the current value of the input

                if (!businessName) {
                    alert("Please enter a business name.");
                    return; // Exit if no business name is provided
                }

                const fullLink = staticPart + businessName;

                // Create a temporary input to copy the link
                const tempInput = document.createElement('input');
                tempInput.value = fullLink;
                document.body.appendChild(tempInput);

                // Select and copy the value
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);

                alert("Link copied to clipboard: " + fullLink);
            }
        </script>

        </body>

</html>