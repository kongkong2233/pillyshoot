<?php
    require_once("tools2.php");
    require_once("BoardDao.php");

    // 전달된 값 저장
    $num     = requestValue("num");
    $page    = requestValue("page");
    
    $writer  = requestValue("writer");
    $title   = requestValue("title");
    $content = requestValue("content");
    
    // 모든 항목이 값이 있으면 업데이트
    if ($writer && $title && $content) {
        $dao = new BoardDao();
        $dao->updateMsg($num, $writer, $title, $content);
       
        // 글 목록 페이지로 복귀
        goNow(bdUrl("community.php", 0, $page));       
    } else
        errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
?>