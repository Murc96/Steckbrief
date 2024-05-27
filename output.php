<?php
function e($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

$gender = isset($_GET['gender']) ? e($_GET['gender']) : 'N/A';
$first_name = isset($_GET['first_name']) ? e($_GET['first_name']) : 'N/A';
$last_name = isset($_GET['last_name']) ? e($_GET['last_name']) : 'N/A';
$age = isset($_GET['age']) ? e($_GET['age']) : 'N/A';
$phone = isset($_GET['phone']) ? e($_GET['phone']) : 'N/A';
$mail = isset($_GET['mail']) ? e($_GET['mail']) : 'N/A';
$adress = isset($_GET['adress']) ? e($_GET['adress']) : 'N/A';
$zip_code = isset($_GET['zip_code']) ? e($_GET['zip_code']) : 'N/A';
$city = isset($_GET['city']) ? e($_GET['city']) : 'N/A';
$image = isset($_GET['image']) ? 'uploads/' . e($_GET['image']['name']) : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formular Ausgabe</title>
</head>
<body>
        <img src="<?php echo $image; ?>" alt="Uploaded Image">
        <h1>Persönliche Daten</h1>
        <p><strong>Geschlecht:</strong> <?php echo $gender; ?></p>
        <p><strong>Vorname:</strong> <?php echo $first_name; ?></p>
        <p><strong>Nachname:</strong> <?php echo $last_name; ?></p>
        <p><strong>Alter:</strong> <?php echo $age; ?></p>
        <p><strong>Telefon:</strong> <?php echo $phone; ?></p>
        <p><strong>E-Mail:</strong> <?php echo $mail; ?></p>
        <p><strong>Adresse:</strong> <?php echo $adress; ?></p>
        <p><strong>PLZ:</strong> <?php echo $zip_code; ?></p>
        <p><strong>Ort:</strong> <?php echo $city; ?></p>
    
</body>
</html>
