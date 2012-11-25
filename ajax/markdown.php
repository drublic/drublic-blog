<?php
if (isset($_GET['markdown'])) {
	$comment = Markdown($_POST['text']);

	ob_clean();
	echo $comment;
	die();
}
