제목 : <?php echo $result->title; ?> <br />
작성자 : <?php echo $result->name; ?> <br />
내용 : <br />
<?php echo nl2br($result->content); ?>

<br /><br />

<a href="/index.php/board/update?id=<?php echo $result->_id; ?>">글수정</a>
<a href="javascript:board_delete('<?php echo $result->_id; ?>')">글삭제</a>


<script>
// 삭제할 것인지 물어보고 삭제확인을 하게 되면 폼 컨트롤러 board_delete 메서드로 이동
// get방식으로 _id 전달
function board_delete(str) {
    if (confirm("진짜 삭제 하실래요?")) {
        location.href = "/index.php/form/board_delete?id=" + str;
    }
}
</script>

