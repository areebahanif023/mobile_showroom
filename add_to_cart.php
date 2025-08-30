<?php
include_once "db_connect.php";
if(isset($_POST['add_to_cart'])){
	if(isset($_SESSION['shopping_cart']))
	{
		$item_array_id= array_column($_SESSION['shopping_cart'], 'item_id');
		if(!in_array($_GET['id'], $item_array_id))
		{
			$count = count($_SESSION['shopping_cart']);
			$item_array = array(
			'item_id'	=> $_GET['id'],
			'item_image'	=> $_POST['hidden_image'],
			'item_name'	=> $_POST['hidden_name'],
			'item_price'	=> $_POST['hidden_price'],
			'item_quantity'	=> $_POST['quantity']
			);
			$_SESSION['shopping_cart'][$count] = $item_array;
			echo "<script>window.location.href='index.php'
			alert('Product add to cart successfully')</script>";
		}
		else
		{
			echo "<script>window.location.href='index.php'
			alert('This product already added into the cart')</script>";
		}
	}
	else
	{
		$item_array = array(
		'item_id'	=> $_GET['id'],
		'item_image'	=> $_POST['hidden_image'],
		'item_name'	=> $_POST['hidden_name'],
		'item_price'	=> $_POST['hidden_price'],
		'item_quantity'	=> $_POST['quantity']
		);
		$_SESSION['shopping_cart'][0] = $item_array;
		echo "<script>window.location.href='index.php'
			alert('Product add to cart successfully')</script>";
	}
}

if(isset($_GET['action']))
{
	if($_GET['action']== 'update')
	{
		foreach($_SESSION['shopping_cart'] as $keys => $values)
		{
			if($values['item_id'] == $_GET['id'])
			{
				$_SESSION['shopping_cart'][$keys]['item_quantity'] = $_POST['quantity'];
				echo "<script>window.location.href='cart.php'
				alert('Product quantity updated successfully')</script>";
			}
		}
	}
	else if($_GET['action']== 'delete')
	{
		foreach($_SESSION['shopping_cart'] as $keys => $values)
		{
			if($values['item_id'] == $_GET['id'])
			{
				unset($_SESSION['shopping_cart'][$keys]);
				echo "<script>window.location.href='cart.php'
			alert('Product deleted from shopping cart successfully')</script>";
			}
		}
	}
}
?>