<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Tebak Angka</title>
</head>
<body>

<?php
// Inisialisasi variabel
$randomNumber = rand(1, 10);
$guess = null;

// Cek apakah formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan tebakan pemain
    $guess = $_POST["guess"];

    // Validasi tebakan
    if (!empty($guess) && is_numeric($guess)) {
        // Membandingkan tebakan dengan angka acak
        if ($guess == $randomNumber) {
            $result = "Selamat, tebakan Anda benar!";
        } else {
            $result = "Maaf, tebakan Anda salah. Angka yang benar adalah $randomNumber.";
        }
    } else {
        $result = "Masukkan tebakan angka yang valid.";
    }
}
?>

<h1>Game Tebak Angka</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="guess">Masukkan tebakan Anda (1-10): </label>
    <input type="number" name="guess" id="guess" min="1" max="10" required>
    <button type="submit">Tebak</button>
</form>

<?php
// Menampilkan hasil tebakan
if (isset($result)) {
    echo "<p>$result</p>";
}
?>

</body>
</html>
