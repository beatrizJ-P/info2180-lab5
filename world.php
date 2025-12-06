<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'world';

$country = $_GET['country'] ?? '';
//$country = filter_var($country, FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE :country");

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
//$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
