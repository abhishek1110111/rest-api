<!-- print_r($data); -->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h2><a href="create">POST MORE data </a></h2>
<h1>welcome to my api </a></h1>
<table class="table table-striped table-hover">
    <tr>
        <td>ID</td>
        <td>title</td>
        <td>body</td>
        
        <td> action</td>
    </tr>
    <?php foreach ($data as $key=>$value): ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $value['body']; ?></td>
            
            <td><a href="edit?id=<?php echo $value['id'];?>">edit</a>  <a href="delete?id=<?php echo $value['id'];?>">delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
