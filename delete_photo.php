<?php
/**
 * Created by PhpStorm.
 * User: nata
 * Date: 22/10/18
 * Time: 22:35
 */

require('config.php');

$id = $_GET['id'];
$stmt = $conn->prepare("UPDATE media SET file_status = 'deleted' WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();



header('Location: media.php');
exit();
