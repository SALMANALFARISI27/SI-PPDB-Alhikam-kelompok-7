<?php
$db = \Config\Database::connect();
$query = $db->query("DESCRIBE calon_peserta_didik");
print_r($query->getResult());
