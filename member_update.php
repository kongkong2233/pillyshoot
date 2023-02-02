<?php
	require_once("tools.php");
	require_once("MemberDao.php");
	
	$id = requestValue("id");
	$pw = requestValue("pw");
	$name = requestValue("name");
	
	if ($id && $pw && $name) {
		
		$mdao = new MemberDao();
		$mdao->updateMember($id, $pw, $name);
		
		session_start_if_none();
		$_SESSION["uname"] = $name;
		
		okGo("회원정보가 수정되었습니다.", MAIN_PAGE);		
	} else
		errorBack("모든 입력란을 채워주세요.");	
?>