<table border=1>
    <tr>
        <td>번호</td>
        <td>제목</td>
        <td>작성자</td>
    </tr>
<?php
foreach($list as $row)
{ 
?>
    <tr>
        <td><?php echo $row['_id']?></td>
        <td><a href='/index.php/board/view?id=<?php echo $row['_id']?>'><?php echo $row['title']?></a></td>
        <td><?php echo $row['name']?></td>
    </tr>
<?php }?>
</table>

<br />
<form method="get">
<input type='text' name="search" value="<?php echo $search?>">
<input type="submit" value="검색하기">
</form>
<?php echo $page_nation;?>
<br />


<a href='/index.php/board/input/'>글쓰기</a>