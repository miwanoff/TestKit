 <?php
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');

const SERVER_NAME = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DB_NAME = "test_kit";

$conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
$users = [];
$result = $conn->query("SELECT name,email,registration_date,role_id FROM users");

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row; 
}
print_r($users);

$fp = fopen('file.csv', 'w');
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) )); // Для поддержки кириллицы добавляются отметки BOM, альтернативные решения - https://csv.thephpleague.com/9.0/converter/charset/, https://stackoverflow.com/questions/17592707/php-export-csv-when-data-having-utf8-charcters, https://phpspreadsheet.readthedocs.io/en/latest/ 
foreach ($users as $row) { 
    fputcsv($fp, $row);
}
fclose($fp);