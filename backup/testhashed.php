
<?php

$hash = '$2y$10$EJMaA0b1ytNI/HVNr2v7f.zhCoF704G1qkpMWoEl35f';

if (password_verify('12345', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
