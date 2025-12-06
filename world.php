<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'world';

$country = $_GET['country'] ?? '';
$country = filter_var($country, FILTER_SANITIZE_STRING);

$cities = $_GET['cities'] ?? '';
$cities = filter_var($cities, FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE :country");
if ($cities == 'lookupC'){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%'");
  
}
else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($cities == 'lookupC'): ?>
<table>
  <tr>
    <th>City Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['district']) ?></td>
      <td><?= htmlspecialchars($row['population']) ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<?php else: ?>
<table>
  <tr>
    <th>Country Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['continent']) ?></td>
      <td><?= htmlspecialchars($row['independence_year']) ?></td>
      <td><?= htmlspecialchars($row['head_of_state']) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>
