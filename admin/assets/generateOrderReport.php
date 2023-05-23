<?php 

require "../conn.php";

$sd = $_GET['sd'];
$ed = $_GET['ed'];

$sql = "SELECT * FROM orders WHERE order_date BETWEEN '$sd' AND '$ed' ";
$result = mysqli_query($conn,$sql);

$sql2 = "SELECT sum(amount_paid) as total FROM orders WHERE order_date BETWEEN '$sd' AND '$ed' ";
$query_run = mysqli_query($conn, $sql2);
$data = mysqli_fetch_array($query_run);
$total = "$data[total]";


$html = '<table>
<tr>
 <td><b>Order ID</b></td> 
 <td><b>Name</b></td> 
 <td><b>Email ID</b></td> 
 <td><b>Phone</b></td> 
 <td><b>Products</b></td> 
 <td><b>Pickup Location</b></td> 
 <td><b>Pickup Time</b></td> 
 <td><b>Payment Mode</b></td> 
 <td><b>Amount Paid</b></td> 
 <td><b>Order Date</b></td> 
 <td><b>Order Status</b></td> 
 <td><b>Payment Status</b></td> 
 </tr>';


while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr> 
    <td>' . $row['orderid'] . '</td> 
    <td>' . $row['name'] . '</td> 
    <td>' . $row['email'] . '</td> 
    <td>' . $row['phone'] . '</td> 
    <td>' . $row['products'] . '</td> 
    <td>' . $row['pblock'] . '</td>  
    <td>' . $row['pslot'] . '</td>  
    <td>' . $row['pmode'] . '</td>  
    <td>' . $row['amount_paid'] . '</td>  
    <td>' .  date('d/M/Y h:m:s L', strtotime($row['order_date'])) . '</td>
    ';
    ?>
    <?php
    if($row['order_status']==0){
    $html .= '<td>Pending</td>';  
    }elseif($row['order_status']==1){
    $html .='<td>Delivered</td>';  
    }elseif($row['order_status']==2){
    $html .='<td>Cancelled</td>';  
    }



    if($row['payment_status']==0){
     $html .='<td>Not Paid</td>';  
    }else{
    $html .='<td>Paid</td>';  
    }
    ?>
    <?php
    '
    </tr>';
}

    $html .= '<tr> 
    <td></td> 
    <td></td> 
    <td></td> 
    <td></td> 
    <td></td> 
    <td></td>  
    <td></td>  
    <td></td>  
    <td><b>Total: '. $total .'</b></td>
    <td></td>  
    <td></td>
    <td></td>   
    </tr>';

$html .= "</table>";

header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=orders-list.xls');
echo $html ;

?>