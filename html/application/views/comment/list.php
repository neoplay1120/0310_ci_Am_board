<table border=1> 
<?php
    foreach($result as $row)
    {
    ?>
    <tr>
        <td>작성자: <?php echo $row['name']?></td>
        <td>댓글내용 : <?php echo $row['content']?></td>
        <td><a href="javascript:comment_delete('<?php echo $board_id?>', '<?php echo $row['_id']?>');">X</a></td>
    </tr>
<?php }?>     
</table>
<form method="post" action="/index.php/form/comment_insert">
    <input type="hidden" name="board_id" value="<?php echo $board_id?>">
    <input type="text" name="content">
    <input type="submit" value="댓글작성">
</form>

<script>
    function comment_delete(board_id, comment_id)
    {  
        if(confirm('진짜지우실?'))
        {
            // 사용자가 확인버튼을 누르게 되면 form컨트롤러의 comment_delete 메서드로 이동합니다. 
            // get방식으로 댓글의 id 값을 전달합니다.
            location.href = "/index.php/form/comment_delete?board_id=" + board_id + "&comment_id=" + comment_id;
        }

    }
    </script>