<form method="post" action="/index.php/form/board_update">

<input type="hidden" name="_id" value="<?php echo $result->_id; ?>">
<input type="text" name="title" value="<?php echo $result->title; ?>"> <br />
<textArea name="content"><?php echo $result->content; ?></textArea> <br />
<input type="submit" value="글 수정">

</form>