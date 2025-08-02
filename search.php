<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSearch = $_POST["usersearch"];

    try {
        require_once "includes/dbh.inc.php";
        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":usersearch", $userSearch);

        $stmt->execute();
        //fetch data w/ associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        header("Loocation: index.php");
    } catch (PDOException $e) {

        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Loocation: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="searchform" action="search.php" method="post">
        <label for="search">Search for user: </label>
        <input id="search" type="text" name="usersearch" placeholder="Search...">
        <br>
        <button>Search</button>
    </form>
    <section>
        <h3>Search Results:</h3>
        <?php
        if (empty($results)) {
            echo "<div><h4>There are no results</h4></div>";
        } else {
            foreach ($results as $rows) {
                echo "<div>";
                echo htmlspecialchars($rows["username"]);
                echo htmlspecialchars($rows["comment_text"]);
                echo htmlspecialchars($rows["created_at"]);
                echo "</div>";
            }
        }

        ?>
    </section>

</body>

</html>