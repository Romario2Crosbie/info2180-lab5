<?php

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
error_reporting(0);
$country = $_GET['country'];
$lookup = $_GET['lookup'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

?>


<?php 
if ($lookup == 'cities'){ 
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities inner join countries on cities.country_code = countries.code where countries.name like '%$country%' group by cities.name");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  
  ?>

  <table class='table'>
  <thread>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
  </thread>
  <tbody>
<?php foreach($results as $row): ?>
      <tr>
        <td><?=$row['name']; ?></td>
        <td><?=$row['district']; ?></td>
        <td><?=$row['population']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
    
  <?php }
  else {
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <table class ='table'>
  <thread>
    <tr>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>
  </thread>
  <tbody>
<?php foreach($results as $row): ?>
      <tr>
        <td><?=$row['name']; ?></td>
        <td><?=$row['continent']; ?></td>
        <td><?=$row['independence_year']; ?></td>
        <td><?=$row['head_of_state']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
<?php } ?>





      
      



