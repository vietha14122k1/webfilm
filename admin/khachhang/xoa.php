<?php
require_once('../database/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['username'])) {
					$id = $_POST['username'];
					$sql = 'delete from phim where username = '.$id;
					execute($sql);
				}
				break;
		}
	}
}?>