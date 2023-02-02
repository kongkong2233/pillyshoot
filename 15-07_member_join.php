<?php
	require_once("tools.php");
	require_once("MemberDao.php");

	$id = requestValue("id");
	$pw = requestValue("pw");
	$email = requestValue("email");
	$name = requestValue("name");

	$mdao = new MemberDao();

	if($id && $pw && $email && $name){
		if ($mdao->getMember($id))
			errorBack("이미 사용 중인 아이디입니다.");
		else{
			$mdao->insertMember($id, $pw, $email, $name);
			okGo("가입이 완료되었습니다.", MAIN_PAGE);
		}
	} else
		errorBack("모든 입력란을 채워주세요.");
?>