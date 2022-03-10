제목 : <?php echo $result->title?> <br />
작성자 : <?php echo $result->name?> <br />
내용 : <br />
<?php echo nl2br($result->content)?>
<br /><br />

<a href="/index.php/board/update?id=<?php echo $result->_id?>">글수정</a> 
<a href="/index.php/board/list">목록으로</a> 
<a href="javascript:board_delete('<?php echo $result->_id?>')">글삭제</a>

<script>
function board_delete(str)
{
    if(confirm("진짜 삭제 하실래요?"))
    {
        location.href="/index.php/form/board_delete?id="+str;
    }
}
</script>
