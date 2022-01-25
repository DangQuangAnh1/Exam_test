<?php
function conn(){
    $servername = "localhost";
    $username = "test123";
    $password = "test123";
    $dbname = "exam_db";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function result($conn,$sql){
    $result = $conn->query($sql);
    echo "<table>
            <tr>
              <th class='col1'>id</th>
              <th class='col2'>name</th>
              <th class='col3'>Publisher</th>
              <th class='col4'>Price</th>
            </tr>";
    while($row = mysqli_fetch_object($result)) {
      echo "<tr>
      <td class='col1'>".$row->id."</td>
      <td  class='col2'>".$row->name."</td>
      <td  class='col3'> ".$row->publisher."</td>
      <td  class='col3'> ".$row->price."</td>
      </tr>";
    }
    echo "</table>";
}
?>
