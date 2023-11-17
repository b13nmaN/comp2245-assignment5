<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// get a all countries




// get query parameter
$country = $_GET['country'];


// get the country from the database
$select = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
$select->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
$select->execute();
$results = $select->fetchAll(PDO::FETCH_ASSOC);

  // echo '<ul>';
  //   foreach ($results as $row) {
  //       echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
  //   }
  //   echo '</ul>';


?>
<ul>
  <?php foreach ($results as $row): ?>
    <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
  <?php endforeach; ?>
</ul>
