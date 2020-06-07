<?php

use yii\helpers\Html;

?>
<div class="site-index">
    <div class="jumbotron">
       <h1 style="color:#337ab7">Display the Table Records</h1>
    </div>
    <?=Html::a('Download CSV', ['/site/import'], ['class' => 'btn btn-primary']); ?>
    <div class="body-content">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Customer Id</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Plan</th>
                        <th scope="col">Customer Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($information) > 0): ?>
                    <?php foreach ($information as $value): ?>
                    <tr class="table-active">
                        <td><?php echo $value->customer_id; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->customer_name; ?></td>
                        <td><?php echo $value->customer_plan; ?></td>
                        <td><?php echo $value->password_hash; ?></td>
                        <td>
                        <span><?= Html::a('Edit Information', ['edit', 'Email' => $value->email], ['class' => 'label label-default']); ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else:?>
                    <tr>
                        <td>No Records Found</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
