<?php
    require_once("tools2.php");
    require_once("BoardDao.php");
    
    // 전달된 페이지 번호 저장
    $page = requestValue("page");

    // 화면 구성에 관련된 상수 정의
    define("NUM_LINES",      100);   // 게시글 리스트의 줄 수
    define("NUM_PAGE_LINKS", 3);   // 화면에 표시될 페이지 링크의 수

    // 게시판의 전체 게시글 수 구하기
    $dao = new BoardDao();
    $numMsgs = $dao->getNumMsgs();

    if ($numMsgs > 0) {
        // 전체 페이지 수 구하기
        $numPages = ceil($numMsgs / NUM_LINES);

        // 현재 페이지 번호가 (1 ~ 전체 페이지 수)를 벗어나면 보정
        if ($page < 1)
            $page = 1;
        if ($page > $numPages)
            $page = $numPages;

        // 리스트에 보일 게시글 데이터 읽기
        $start = ($page - 1) * NUM_LINES;     // 첫 줄의 레코드 번호
        $msgs = $dao->getManyMsgs($start, NUM_LINES);

        // 페이지네이션 컨트롤의 처음/마지막 페이지 링크 번호 계산
        $firstLink = floor(($page - 1) / NUM_PAGE_LINKS)
                   * NUM_PAGE_LINKS + 1;
        $lastLink = $firstLink + NUM_PAGE_LINKS - 1;
        if ($lastLink > $numPages)
            $lastLink = $numPages;
    }
	
	//현재 로그인한 사용자 아이디 저장(로그아웃 상태이면 빈 문자열)
	session_start_if_none();
	$loginId = sessionVar("uid");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">    
</head>
<body>

<?php 
  include 'login_head.php';
?>

<?php
	require_once("tools2.php");
	
	session_start_if_none();
	$id = sessionVar("uid");
	$name = sessionVar("uname");
?>

<div class="top_menu">
	<span class="c_text1">COMMUNIY</span>
</div>
<div class="community_chat1" style="overflow: scroll;"> 

<div class="container2">
    <?php if ($numMsgs > 0) : ?>
            <?php foreach ($msgs as $row) : ?>
            <div class="chart1">
                <td>
                    <a href="<?= bdUrl("community-1.php", $row["num"], 
                              $page) ?>" class="crt_text1"><?= $row["title"] ?></a>
                
                <a class="crt_text2"><?= $row["writer"] ?></a>
				<a class="crt_text3">&nbsp;&nbsp;&nbsp; 조회수 <?= $row["hits"] ?></a></td>
            </div>
            <?php endforeach ?>
        </table>
</div>

<!--
<div class="pagenum">
        <br>
        <?php if ($firstLink > 1) : ?>
            <a href="<?= bdUrl("community.php", 0, 
                         $page - NUM_PAGE_LINKS) ?>"><</a>&nbsp;
        <?php endif ?>

        <?php for ($i = $firstLink; $i <= $lastLink; $i++) : ?>
            <?php if ($i == $page) : ?>
                <a href="<?= bdUrl("community.php", 0, $i) 
                             ?>"><b><?= $i ?></b></a>&nbsp;
            <?php else : ?>
                <a href="<?= bdUrl("community.php", 0, $i)
                             ?>"><?= $i ?></a>&nbsp;
            <?php endif ?>
        <?php endfor ?>
		

	

        <?php if ($lastLink < $numPages) : ?>
            <a href="<?= bdUrl("community.php", 0, 
                               $page + NUM_PAGE_LINKS) ?>">></a>
        <?php endif ?>

    <?php endif ?>
</div>    -->

<?php
      if ( $jb_login ) {
    ?>
    
<div class="write__btn">
        <input type="button" value="글쓰기" style="color: white;"
               onclick="location.href=
                '<?= bdUrl("write.php", 0, $page) ?>'">
		
</div>

<?php
      }
    ?>

</div>
<nav class="nav">
        <ul class="nav__list">
            <li class="nav__btn">
                <a href="index.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <rect x="10" y="12" width="4" height="4" />
                        </svg>
                    </div>

                    <div class="nav__btn__text">HOME</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="medical.php" class="nav__link">
                    <div class=" nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                            <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">MEDICAL</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="community.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">COMMUNIY</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="mypage.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">MY PAGE</div>
                </a>
            </li>
        </ul>
    </nav>	

</body>
</html>