<?php
use yii\helpers\Html;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;

?>
<div id="wrraper">
    <h1 style="text-align:center;color:SteelBlue;">Display Data From API</h1>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>

    </tr>
    </thead>
    <tbody>
    <?php
//    print_r($data);
    foreach ($data as $key=>$value) {
        $html='<tr >
      <th scope="row">'.$value['id'].'</th>
      <th scope="row">'.$value['name'].'</th>
      <th scope="row">'.$value['username'].'</th>
      <th scope="row">'.$value['email'].'</th>
    </tr>';
        echo($html);
    }
    ?>
    </tbody>
</table>