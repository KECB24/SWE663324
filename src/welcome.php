<?php
// Connect to database
require_once 'db_connection.php';


// Check if logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["ProfileID"])) {
    header("Location: login.php");
    exit;
} else {
    $profileId = $_SESSION['ProfileID'];
}

// Initialize variable
$firstName = "";

// Query
$query = "SELECT firstName FROM user_profile WHERE profileID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $profileId);

if ($stmt->execute()) {
    $stmt->bind_result($firstName);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Error fetching profile details.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Ubid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&family=Poppins:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        // Load header and footer
        $(function () {
            $("#header").load("header.php");
            $("#footer").load("footer.html");
        });
    </script>
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 250px;
        }

        .image-container img {
            width: auto;
            height: 100%;
        }

        .custom-container {
            padding: 2vh;
        }

        .custom-caption {
            padding-top: 3vh;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="header"></div>
    <main class="container mt-5">
        <h1 class="text-start pl-5 mb-3">Welcome, <?php echo ucfirst($firstName); ?>!</h1>
        <div class="text-center">
            <div class="row">
                <div class="col-md-4 custom-container">
                    <div class="image-container">
                        <img src="images\viewMyListings.png">
                    </div>
                    <!-- View my listings page -->
                    <figcaption class="figure-caption custom-caption">
                        <b><a href="viewMyListings.php">View My Listings</a></b>
                    </figcaption>
                </div>
                <div class="col-md-4 custom-container">
                    <div class="image-container">
                        <img src="images\createListing.png">
                    </div>
                    <!-- Create listings page -->
                    <figcaption class="figure-caption custom-caption">
                        <b><a href="createListing.php">Create a Listing</a></b>
                    </figcaption>
                </div>
            </div>
        </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
</body>

</html>