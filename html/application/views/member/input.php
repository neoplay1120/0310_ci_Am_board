<?php echo $msg;?>
<form method="post" action="/index.php/member/insert">
    이메일 : <input type="text" name="email"> <br />
    비밀번호 : <input type="password" name="password"> <br />
    <input type="submit" value="회원가입">
    <a href='/index.php/member/login'>로그인</a>
</form>

