<?php
  require_once('includes/config.php');
  $sql = "SELECT * FROM verjaardagen";
  $result = $conn->query($sql);

  include('includes/age.php');

  if ($result->num_rows > 0)
  {
    echo "<table>
      <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Geboortedatum</th>
        <th>Age</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>";


    while ($row = $result->fetch_assoc())
    {
        //age calculation
        $date_1 = $row['geboortedatum'];
        $today = new DateTime();
        $date_2 = $today->format("Y-m-d");
        $years = dateDifference($date_1, $date_2) / 365;


//outputs van elke row
      echo "<tr>";
      echo '<td>'. $row['voornaam'] .'</td>';
      echo '<td>'. $row['achternaam'] .'</td>';
      echo '<td>'. $row['geboortedatum'] .'</td>';
      echo '<td>'. (floor($years)) . '</td>';
      echo '<td> <a href="update.php?id='.$row['id'].'">Edit</a></td>';
      echo '<td> <a href="delete.php?id='.$row['id'].'">Delete</a></td>';
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }


?>
