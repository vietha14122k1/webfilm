<?php
require_once('../database/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['maphim'])) {
					$id = $_POST['maphim'];
					$sql = 'delete from phim where maphim = '.$id;
					execute($sql);
				}
				break;
		}
	}
}?>