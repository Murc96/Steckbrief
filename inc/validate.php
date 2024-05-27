<?php

function is_text(string $input, int $min = 1, int $max = 50): bool {
    return strlen($input) >= $min && strlen($input) <= $max;
}

function is_number($input, int $min = 12, int $max = 100): bool {
    return filter_var($input, FILTER_VALIDATE_INT, ["options" => ["min_range" => $min, "max_range" => $max]]) !== false;
}

function check_phone_number($number): bool {
    return preg_match('/^\+?[0-9]+$/', $number);
}

function e(string $input): string {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

function validate_form($data, $files) {
    $errors = [];

    if (empty($data['male']) && empty($data['female']) && empty($data['divers'])) {
        $errors['gender'] = "Geschlecht muss ausgewählt werden.";
    }

    if (!is_text($data['first_name'])) {
        $errors['first_name'] = "Vorname ist ungültig.";
    }

    if (!is_text($data['last_name'])) {
        $errors['last_name'] = "Nachname ist ungültig.";
    }

    if (!is_number($data['age'])) {
        $errors['age'] = "Alter muss eine Zahl zwischen 12 und 100 sein.";
    }

    if (!check_phone_number($data['phone'])) {
        $errors['phone'] = "Telefonnummer ist ungültig.";
    }

    if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "E-Mail ist ungültig.";
    }

    if (!is_text($data['adress'])) {
        $errors['adress'] = "Adresse ist ungültig.";
    }

    if (!is_text($data['zip_code'])) {
        $errors['zip_code'] = "PLZ ist ungültig.";
    }

    if (!is_text($data['city'])) {
        $errors['city'] = "Ort ist ungültig.";
    }

    if ($files['image']['error'] == UPLOAD_ERR_OK) {
        $allowed = ['image/jpeg', 'image/png'];
        if (!in_array($files['image']['type'], $allowed)) {
            $errors['image'] = "Nur jpg und png sind erlaubt.";
        }

        if ($files['image']['size'] > 4 * 1024 * 1024) {
            $errors['image'] = "Bildgröße darf 4MB nicht überschreiten.";
        }
    } else {
        $errors['image'] = "Bild-Upload fehlgeschlagen.";
    }

    return $errors;
}
