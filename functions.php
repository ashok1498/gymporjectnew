<?php
// php function to verify two md5 encrypted passowrd
function matchPasswords($inputPassword, $storedHash) {
    // Encrypt the input password using MD5
    $encryptedPassword = md5($inputPassword);

    // Compare the encrypted input password with the stored MD5 hash
    if ($encryptedPassword === $storedHash) {
        return true;  // Passwords match
    } else {
        return false; // Passwords do not match
    }
}
?>