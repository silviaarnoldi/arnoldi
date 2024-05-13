<!doctype html>
<html>
<body>
    <?php
    $conn = new mysqli('localhost','root','','arnoldi'); 
    if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
    }
    $codice_tipo_polizza = $_GET['codice_tipo_polizza'];
    
    $sql = "SELECT a.NOME AS Assicurato, SUM(p.PREZZO_PREMIO) AS TotalePremi
    FROM ASSICURATO a
    INNER JOIN CONTRATTO c ON a.ID = c.ASSICURATO_ID
    INNER JOIN POLIZA p ON c.POLIZA_ID = p.ID
    WHERE p.ID = '$codice_tipo_polizza' AND YEAR(c.DATA_INIZIO) = '$anno'
    GROUP BY a.NOME
    ORDER BY a.NOME";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Assicurato</th><th>Totale Premi Pagati</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Assicurato"] . "</td><td>" . $row["TotalePremi"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "Nessun risultato trovato";
}
$conn->close();
?>

</body></html>

