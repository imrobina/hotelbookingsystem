<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Cannot Connect to Database: " . mysqli_connect_error());
}

function filteration($data) {
    foreach ($data as $key => $value) {
        $value = trim($value); // Remove whitespace from the beginning and end
        $value = stripslashes($value); // Remove backslashes
        $value = strip_tags($value); // Strip HTML and PHP tags
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); // Convert special characters to HTML entities
        $data[$key] = $value; // Properly assign the sanitized value back to the array
    }
    return $data;
}

function selectAll($table) {
    global $con; // Use global to access $con
    $query = "SELECT * FROM $table";
    $res = mysqli_query($con, $query);
    if ($res === false) {
        die("Query cannot be executed - SelectAll: " . mysqli_error($con));
    }
    return $res;
}

function select($sql, $values, $datatypes) {
    global $con; // Use global to access $con
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select: " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Select: " . mysqli_error($con));
    }
}

function update($sql, $values, $datatypes) {
    global $con; // Use global to access $con
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Update: " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Update: " . mysqli_error($con));
    }
}

function insert($sql, $values, $datatypes) {
    global $con; // Use global to access $con
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Insert: " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Insert: " . mysqli_error($con));
    }
}
function delete($sql, $values, $datatypes) {
    global $con; // Use global to access $con
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Delete: " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Delete: " . mysqli_error($con));
    }
}
?>
