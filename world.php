<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// get a all countries




// get query parameter
$lookup = $_GET['lookup'] ?? null;
$country = $_GET['country'];

if ($lookup == 'cities') {
  $select = $conn->prepare("SELECT cities.name, cities.district, cities.population 
  FROM countries JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE :country");
  $select->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
  $select->execute();
  $results = $select->fetchAll(PDO::FETCH_ASSOC);


}
else{

  $select = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
  $select->bindValue(':country', '%' . $country . '%', PDO::PARAM_STR);
  $select->execute();
  $results = $select->fetchAll(PDO::FETCH_ASSOC);
  
}

?>

<?php if ($lookup == 'cities'): ?>
  <table>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['district']; ?></td>
      <td><?= $row['population']; ?></td>
    </tr>
  <?php endforeach; ?>

</table>
<?php else:  ?>
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
<?php endif; ?>
