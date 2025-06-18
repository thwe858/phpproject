<?php 
include '../../dbconnect.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $key =$_GET['key'];

    if($key=='publish'){
        $stmt=$pdo->prepare("UPDATE posts SET status=:status, published_at= NOW() where id=:id ");
        $stmt->execute([
            'status'=> 'published',
            'id'=>$id
        ]);

    }
    else if ($key=='reject'){
        $stmt=$pdo->prepare("UPDATE posts SET status=:status where id=:id");
        $stmt->execute([
        'status'=> 'rejected',
        'id'=>$id
        ]);

    }
    header('Location: list.php');
}
?>