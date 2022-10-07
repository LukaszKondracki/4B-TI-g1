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
        VALUES (?, ?, ?);
    SQL;

    // Execute the SQL query
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $body);

    $res = mysqli_stmt_execute($stmt);

    mysqli_close($db);

    // Check for errors
    return $res;
}

/**
 * Saves data using MySQLi object-oriented approach
 */
function save_mysqli_o(string $name, string $email, string $body): bool {
    $db = new mysqli('127.0.0.1', 'root', '', '4bti');

    // Check for errors
    if ($db->errno) {
        echo $db->error;
        return false;
    }

    // Create SQL query
    $sql = <<<SQL
        INSERT INTO messages (Name, Email, Body)
        VALUES (?, ?, ?);
    SQL;

    // Execute the SQL query
    $stmt = $db->prepare($sql);
    $stmt->bind_param('sss', $name, $email, $body);
    $res = $stmt->execute();

    $db->close();

    return $res;
}

/**
 * Saves data using PDO
 */
function save_pdo(string $name, string $email, string $body): bool {
    $db = new PDO('mysql:host=127.0.0.1;dbname=4bti', 'root', '');
    
    if ($db->errorCode()) {
        echo json_encode($db->errorInfo(), JSON_PRETTY_PRINT);
        return false;
    }

    // Create SQL query
    $sql = <<<SQL
        INSERT INTO messages (Name, Email, Body)
        VALUES (?, ?, ?);
    SQL;

    $stmt = $db->prepare($sql);

    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $body, PDO::PARAM_STR);

    $res = $stmt->execute();

    return $res;
}