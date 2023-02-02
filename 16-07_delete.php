<?php
    require_once("tools2.php");
    require_once("BoardDao.php");

    // 전달된 값 저장
    $num    = requestValue("num");
    $page   = requestValue("page");
    
    // $num번 글의 레코드 삭제
    $dao = new BoardDao();
    $dao->deleteMsg($num);
  
    // 글 목록 페이지로 복귀  
    goNow(bdUrl("community.php", 0, $page));
?>