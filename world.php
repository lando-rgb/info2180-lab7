<?php
$host = getenv('IP');
$username = 'lando99';
$password = 'X-HY22g9';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$country =$_GET['country'];
$all =$_GET['all'];
filter_var($country, FILTER_SANITIZE_STRING);
if($all =='false') {
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else {
	$stmt = $conn->query("SELECT * FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%';");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php if ($all == "false"): ?>
<table border= "1" style="width:100%">
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
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
<?php else: ?>
  <table style="width:100%">
      <tr>
        <th>Name</th>
        <th>District</th>
        <th>Popualtion</th>
      </tr>
      <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
      </tr>
      <?php endforeach; ?>
  </table>
<?php endif; ?>