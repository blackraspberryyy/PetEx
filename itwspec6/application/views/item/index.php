<?php date_default_timezone_set("Asia/Manila"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <center>
            <a href="<?= base_url() ?>item/add" class="btn btn-success">ADD</a><br>
            </center>
            <br>
            <div class="panel panel-success">
                <div class="panel-heading">
                    ITEMS
                </div>
                <div class="panel-body">
                    <?php if (!$items): ?>
                        <h1>Table is EMPTY</h1>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                            <th>ITEM ID</th>
                            <th>ITEM NAME</th>
                            <th>ITEM DESC</th>
                            <th>ITEM PRICE</th>
                            <th>ADDED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTION</th>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?> 
                                    <tr>
                                        <td><?= $item->item_id ?></td>
                                        <td><?= $item->item_name ?></td>
                                        <td><?= $item->item_desc ?></td>
                                        <td><?= $item->item_price ?></td>
                                        <td><?= date('m/j/Y h:i A', $item->added_at) ?></td>
                                        <td><?= date('m/j/Y h:i A', $item->updated_at) ?></td>
                                        <td>
                                <center>   
                                    <a href="<?= base_url() ?>item/update/<?= $item->item_id ?>" class="btn btn-info">EDIT</a>
                                    <a href="<?= base_url() ?>item/delete/<?= $item->item_id ?>" class="btn btn-danger">DELETE</a>
                                </center> 
                                </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>