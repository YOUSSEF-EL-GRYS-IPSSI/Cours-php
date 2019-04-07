
<?php
//header('Content-type: application/json; charset=UTF-8');
$response = array();
 
if ($_POST['id']) {
 echo $_POST['id'];
    require_once 'db_config.php';
 
    $pid = intval($_POST['id']);
    $query = "DELETE FROM users WHERE id=:id";
    $stmt = $connect->prepare( $query );
    $stmt->execute(array(':id'=>$pid));
    
    if ($stmt) {
        $response['status']  = 'success';
 $response['message'] = 'article Deleted Successfully ...';
    } else {
        $response['status']  = 'error';
 $response['message'] = 'Unable to delete article ...';
    }
    echo json_encode($response);
}


