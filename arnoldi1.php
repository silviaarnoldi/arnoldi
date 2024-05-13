<!doctype html>
<html>
<body>
    <?php
    $conn = new mysqli('localhost','root','','arnoldi'); 
    if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
    }
    $codice_tipo_polizza = $_GET['codice_tipo_polizza'];

    $sql = "SELECT a.NOME AS Assicurato, ass.NOME AS Assicuratore
        FROM ASSICURATO a
        INNER JOIN CONTRATTO c ON a.ID = c.ASSICURATO_ID
        INNER JOIN ASSICURATORE ass ON c.ASSICURATORE_ID = ass.ID
        WHERE c.POLIZA_ID = '$codice_tipo_polizza'
        ORDER BY a.NOME";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Assicurato</th><th>Assicuratore</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Assicurato"] . "</td><td>" . $row["Assicuratore"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "Nessun risultato trovato";
}
$conn->close();
?>

</body></html>

