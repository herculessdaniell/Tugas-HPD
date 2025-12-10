<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDENTIFIKASI BILANGAN</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        input[type="number"] { padding: 10px; width: 200px; }
        button { padding: 10px 16px; background-color: #0011ffff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #00ff22ff; }
        .result { margin-top: 20px; padding: 10px; border: 5px solid #4d4d4dff; background-color: #c0fc72ff; 
            width: 400px; /* Tambahan: Lebar tetap 400px  */
            max-width: 100%; /* Responsif untuk layar kecil  */
        }
    </style>
</head>
<body>
    <h1>IDENTIFIKASI BILANGAN</h1>
    <form method="POST" action="">
        <label for="bilangan">Masukkan bilangan :</label><br>
        <input type="number" id="bilangan" name="bilangan" min="1" required><br><br>
        <button type="submit">Cek Bilangan</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilangan = $_POST['bilangan'];

        // Validasi input
        if (!is_numeric($bilangan) || $bilangan <= 0 || !is_int((int)$bilangan)) {
            echo "<div class='result'>Error: Masukkan bilangan bulat positif yang valid!</div>";
        } else {
            $bilangan = (int)$bilangan; // Pastikan integer

            // Cek Ganjil/Genap
            $jenis = ($bilangan % 2 == 0) ? "Bilangan Genap" : "Bilangan Ganjil";

            // Cek Prima
            $isPrima = true;
            if ($bilangan <= 1) {
                $isPrima = false;
            } else {
                for ($i = 2; $i <= ($bilangan-1); $i++) {
                    if ($bilangan % $i == 0) {
                        $isPrima = false;
                        break;
                    }
                }
            }
            $primaStatus = $isPrima ? "Bilangan Prima" : "Bukan Bilangan Prima";

            // Output hasil
            echo "<div class='result'>";
            echo "<h3>Hasil Identifikasi:</h3>";
            echo "<p>Bilangan: $bilangan</p>";
            echo "<p>Tipe: $jenis</p>";
            echo "<p>Status Prima: $primaStatus</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>