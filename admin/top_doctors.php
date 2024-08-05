<?php
// Assuming you have already established a database connection
include './connection/conn.php';

// Query to fetch data from the doctors table
$query = "SELECT * FROM doctors";  // Fetch top-rated doctors
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Loop through each row and generate HTML for each doctor
?>
        <div class="items">
            <div class="text-center">
                <img src="<?php echo $row['File']; ?>" alt="Doctor Photo">
                <div class="dr-star"><i class="fas fa-star"></i> <?php echo $row['rating']; ?></div>
                <h5 class="fs-16 mb-1 font-w600">
                    <a class="text-black" href="doctor_details.php?id=<?php echo $row['DoctorID']; ?>">
                        <?php echo $row['Title'] . ' ' . $row['FirstName'] . ' ' . $row['LastName']; ?>
                    </a>
                </h5>
                <span class="text-primary mb-2 d-block"><?php echo $row['Specialization']; ?></span>
                <p class="fs-12"><?php echo $row['Address']; ?></p>
                <p class="fs-12"><strong>Contact:</strong> <?php echo $row['Mobile']; ?></p>
                <!-- <div class="social-media">
                    <a href="<?php echo $row['instagram']; ?>"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo $row['facebook']; ?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="<?php echo $row['twitter']; ?>"><i class="fa-brands fa-twitter"></i></a>
                </div> -->
            </div>
        </div>
<?php
    }
} else {
    // Handle case where no doctors are found
    echo "<p>No doctors available.</p>";
}
?>
