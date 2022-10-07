<?php

/**
 * Saves data using MySQLi procedural approach
 */
function save_mysqli_p(string $name, string $email, string $body): bool {
    // Connect to database
    $db = mysqli_connect('127.0.0.1', 'root', '', '4bti');

    // Check for errors
    if (mysqli_errno($db)) {
        echo mysqli_error($db);
        return false;
    }

    // Create SQL query
    $sql = <<<SQL
        INSERT INTO messages (Name, Email, Body)
        VALUES ('$name', '$email', '$body');
    SQL;

    // Execute the SQL query
    $res = mysqli_query($db, $sql);

    // Check for errors
    if ($res === false) {
        return false;
    } else {
        return true;
    }
}

/**
 * Saves data using MySQLi object-oriented approach
 */
function save_mysqli_o(string $name, string $email, string $body): bool {

}

/**
 * Saves data using PDO
 */
function save_pdo(string $name, string $email, string $body): bool {

}