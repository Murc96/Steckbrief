<?php
include 'inc/validate.php';

$errors = [];
$data = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate_form($_POST, $_FILES);

    if (empty($errors)) {
        
        $data = [
            'gender' => isset($_POST['male']) ? 'Male' : (isset($_POST['female']) ? 'Female' : 'Divers'),
            'first_name' => e($_POST['first_name']),
            'last_name' => e($_POST['last_name']),
            'age' => e($_POST['age']),
            'phone' => e($_POST['phone']),
            'mail' => e($_POST['mail']),
            'adress' => e($_POST['adress']),
            'zip_code' => e($_POST['zip_code']),
            'city' => e($_POST['city']),
            'image' => $_FILES['image']
        ];

        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($data['image']['name']);
        move_uploaded_file($data['image']['tmp_name'], $target_file);

        
        header('Location: output.php?' . http_build_query($data));
        exit();
    }
}
?>

<main>
    <form method="POST" enctype="multipart/form-data">
        <label id="gender" for="terms">Geschlecht
            <p>Male <input type="checkbox" id="male" name="male"></p>
            <p>Female <input type="checkbox" id="female" name="female"></p>
            <p>Divers <input type="checkbox" id="divers" name="divers"></p>
        </label>
        <?php if (isset($errors['gender'])): ?><p style="color: red"><?php echo $errors['gender']; ?></p><?php endif; ?>

        <label for="first_name">Vorname
            <input type="text" id="first_name" name="first_name" placeholder="Vorname" value=<?= $_POST['first_name'] ?? ''?>>
        </label>
        <?php if (isset($errors['first_name'])): ?><p style="color: red"><?php echo $errors['first_name']; ?></p><?php endif; ?>

        <label for="last_name">Nachname
            <input type="text" id="last_name" name="last_name" placeholder="Nachname" value=<?= $_POST['last_name'] ?? ''?>>
        </label>
        <?php if (isset($errors['last_name'])): ?><p style="color: red"><?php echo $errors['last_name']; ?></p><?php endif; ?>

        <label for="age">Alter
            <input type="text" id="age" name="age" placeholder="Your age" value=<?= $_POST['age'] ?? ''?>>
        </label>
        <?php if (isset($errors['age'])): ?><p style="color: red"><?php echo $errors['age']; ?></p><?php endif; ?>

        <label for="telephone"> Telefon
            <input type="text" id="phone" name="phone" placeholder="Telefonnummer" value=<?= $_POST['phone'] ?? ''?>>
        </label>
        <?php if (isset($errors['phone'])): ?><p style="color: red"><?php echo $errors['phone']; ?></p><?php endif; ?>

        <label for="mail"> E-Mail
            <input type="text" id="mail" name="mail" placeholder="E-Mail" value=<?= $_POST['mail'] ?? ''?>>
        </label>
        <?php if (isset($errors['mail'])): ?><p style="color: red"><?php echo $errors['mail']; ?></p><?php endif; ?>

        <label for="adress"> Adresse
            <input type="text" id="adress" name="adress" placeholder="Adresse" value=<?= $_POST['adress'] ?? ''?>>
        </label>
        <?php if (isset($errors['adress'])): ?><p style="color: red"><?php echo $errors['adress']; ?></p><?php endif; ?>

        <label for="zip_code"> PLZ
            <input type="text" id="zip_code" name="zip_code" placeholder="PLZ" value=<?= $_POST['zip_code'] ?? ''?>>
        </label>
        <?php if (isset($errors['zip_code'])): ?><p style="color: red"><?php echo $errors['zip_code']; ?></p><?php endif; ?>

        <label for="city"> Ort
            <input type="text" id="city" name="city" placeholder="Ort" value=<?= $_POST['city'] ?? ''?>>
        </label>
        <?php if (isset($errors['city'])): ?><p style="color: red"><?php echo $errors['city']; ?></p><?php endif; ?>

        <label for="image">Foto Upload:
            <input type="file" name="image" id="image" accept="image/*">
        </label>
        <?php if (isset($errors['image'])): ?><p style="color: red"><?php echo $errors['image']; ?></p><?php endif; ?>

        <button type="submit" value="Upload">Absenden</button>
    </form>
</main>

