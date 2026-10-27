<?php
// Fichero de prueba SOLO para demostrar la detección de Semgrep
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = " . $id);  // SQL injection

echo $_GET['name'];                                                      // XSS reflejado

eval($_POST['code']);                                                    // ejecución de código
?>