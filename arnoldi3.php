<!doctype html>
<html>
<body>
    <?php
    $conn = new mysqli('localhost','root','','arnoldi'); 
    if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
    }
    $codice_tipo_polizza = $_GET['codice_tipo_polizza'];
    $anno = $_GET['anno'];
    
    // Query per ottenere l'elenco degli assicuratori e il totale dei premi pagati per la polizza e l'anno specificati, ordinati per nome della compagnia assicurativa
    $sql = "SELECT ass.NOME AS Assicuratore, SUM(p.PREZZO_PREMIO) AS TotalePremi
    FROM ASSICURATORE ass
    INNER JOIN CONTRATTO c ON ass.ID = c.ASSICURATORE_ID
    INNER JOIN POLIZA p ON c.POLIZA_ID = p.ID
    WHERE p.ID = '$codice_tipo_polizza' AND YEAR(c.DATA_INIZIO) = '$anno'
    GROUP BY ass.NOME
    ORDER BY ass.NOME";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table><tr><th>Assicuratore</th><th>Totale Premi Pagati</th></tr>";
while ($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Assicuratore"] . "</td><td>" . $row["TotalePremi"] . "</td></tr>";
}
echo "</table>";
} else {
echo "Nessun risultato trovato";
}
$conn->close();
?>

</body></html>

