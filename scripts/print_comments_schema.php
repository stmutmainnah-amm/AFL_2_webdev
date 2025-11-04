<?php
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'database.sqlite';
if (!file_exists($dbPath)) {
    echo "database file not found: $dbPath\n";
    exit(1);
}
$db = new PDO('sqlite:'.$dbPath);
$st = $db->query("PRAGMA table_info('comments')");
$rows = $st->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
