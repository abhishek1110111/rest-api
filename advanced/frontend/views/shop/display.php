<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<table class="table table-striped table-hover">
    <tr>
        <td>ID</td>
        <td>NAME</td>
        <td>PRODUCT</td>
        <td>SIZE</td>
        <td>Action</td>
    </tr>
    <?php foreach ($sql as $key=>$value): ?>
        <tr>
            <td>
                <?php echo $value['ID']; ?>
            </td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['product']; ?></td>
            <td><?php echo $value['size']; ?></td>
            <td><a href="update?id=<?php echo $value['ID'];?>&action=edit">edit</a>  <a href="delete?id=<?php echo $value['ID'];?>&action=delete">delete</a></td>
            
        </tr>
    <?php endforeach; ?>
</table>
<h1><a href="create">ADD MORE </a></h1>
