<?php
// Connect to database
require_once 'db_connection.php';

// Check if query results are set in session
if (!isset($_SESSION['query_results']) || empty($_SESSION['query_results'])) {
    echo "No results found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <main class="container mt-5"></main>
    <!-- Display query results for report -->
    <?php foreach ($_SESSION['query_results'] as $row): ?>
        <div class="mb-3">
            <h5>Item ID: <?= htmlspecialchars($row["itemID"]) ?></h5>
            <p>
                Title: <?= htmlspecialchars($row["title"]) ?><br>
                Description: <?= htmlspecialchars($row["description"]) ?><br>
                Start Time: <?= htmlspecialchars($row["startTime"]) ?><br>
                End Time: <?= htmlspecialchars($row["endTime"]) ?><br>
                Starting Price: <?= htmlspecialchars($row["startingPrice"]) ?><br>
                Highest Bid: <?= htmlspecialchars($row["highestBid"]) ?><br>
                Seller Profile: <?= htmlspecialchars($row["sellerProfile"]) ?><br>
                Buyer Profile: <?= htmlspecialchars($row["buyerProfile"]) ?><br>
                Category ID: <?= htmlspecialchars($row["categoryID"]) ?><br>
            </p>
        </div>
    <?php endforeach; ?>
    </div>
    </main>
    <div id="footer" style="padding-top: 6vh;"></div>
</body>

</html>