<?php 

require "../conn.php";

$sql = "SELECT * FROM management WHERE usertype='Faculty' ORDER BY block ";
$result = mysqli_query($conn,$sql);

$html = '<table><tr> <td><b>UID</b></td> <td><b>Username</b></td> <td><b>Email</b></td> <td><b>Phone</b></td> <td><b>Block</b></td> <td><b>Department</b></td> </tr>';


while($row = mysqli_fetch_assoc($result)){
$html.= '<tr> <td>'.$row['uid'].'</td> <td>'.$row['username'].'</td> <td>'.$row['email'].'</td> <td>'.$row['phone'].'</td> <td>'.$row['block'].'</td> <td>'.$row['department'].'</td>  </tr>';
}

$html.="</table>";

header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=faculty-list.xls');
echo $html ;

?>