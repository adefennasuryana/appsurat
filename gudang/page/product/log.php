<?php include_once('../../header.php'); ?>


<?php
if(isset($_GET['product_id']))
{
	$product_id = safety_filter($_GET['product_id']);	
}
else
{
	alert_box('alert', get_lang('No Product ID')); exit;
}
?>

<table class="dataTable">
	<thead>
    	<tr>
        	<th width="1"></th>
            <th><?php lang('Date'); ?></th>
            <th><?php lang('User'); ?></th>
            <th><?php lang('Product Code'); ?></th>
            <th><?php lang('Type'); ?></th>
            <th><?php lang('Description'); ?></th>
		</tr>
	</thead>
    <tbody>
    <?php
	$query_log = mysql_query("SELECT * FROM $database->log WHERE product_id='$product_id' ORDER BY id DESC");
	while($list_log = mysql_fetch_assoc($query_log))
	{
		echo '
		<tr>
			<td></td>
			<td>'.$list_log['date'].'</td>
			<td><a href="'.get_url('page').'/product/log_user.php?user_id='.$list_log['user_id'].'">'.get_user($list_log['user_id'], 'user_name').'</a></td>
			<td><a href="'.get_url('page').'/product/product.php?product_id='.get_the_product('id').'">'.get_the_product('code').'</a></td>
			<td>'.get_lang($list_log['type']).'</td>
			<td>'.$list_log['text'].'</td>
		</tr>
		';
	}
	?>
    </tbody>
</table>


<?php include_once('../../footer.php'); ?>