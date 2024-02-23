<?php
require_once 'database.php';
global $conn;
$conn = connect();


$SQL = "SELECT * FROM artifact_x_teamviewer ORDER BY random() LIMIT 1";
$stmt = $conn->query($SQL);
$user = $stmt->fetch();

echo "uid: ".$user['uid'].PHP_EOL."teamviewer: ".$user["teamviewer"].PHP_EOL;

$artifact = $user['artifact'];

$tem = $user["teamviewer"];

$len = strlen($tem);
switch($len)
{
    case 8641:

        $tmp = explode(' ',$tem);
        $cid = trim($tmp[36]);
        unset($tmp);
        $ci = substr($cid,0,10);
        save($conn, $ci, $artifact);

    break;
    case 8586:
        $tmp = explode(' ',$tem);
        var_dump($tmp, '8586');
        $cid = trim($tmp[36]);
        unset($tmp);
        $ci = substr($cid,0,10);
        save($conn, $ci, $artifact);
         
    break;
    case 7824:
        $tmp = explode(' ',$tem);
        $cid = trim($tmp[36]);
        unset($tmp);
        $ci = substr($cid,0,10);
        save($conn, $ci, $artifact);
    break;
     
    case 4095:
        $tmp = explode(' ',$tem);
        $cid = trim($tmp[27]);
        unset($tmp);
        $ci = substr($cid,0,10);
        save($conn, $ci, $artifact);
    break;
    case 10:
        die('No modifications needed ');
    break;
    default:
        echo PHP_EOL.$len.PHP_EOL;
    break;
}

function save($conn, $teamviwer, $artifact)
{
    $SQL ="UPDATE artifact_x_teamviewer SET teamviewer=? WHERE artifact= ?";
    $stmt= $conn->prepare($SQL);
    if($stmt->execute([$teamviwer, $artifact]))
    {
        echo 'teamviewer client updated '.$teamviwer.PHP_EOL; exit;
    }
}
 

?>