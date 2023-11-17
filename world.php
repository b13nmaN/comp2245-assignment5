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
<table>
  <tr>
    <th><?='Name'; ?></th>
    <th><?= 'Continent'; ?></th>
    <th><?= 'Independence'; ?></th>
    <th><?= 'Head of State'; ?></th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
