<?php 
  include 'login_head.php';
?>

<?php
	require_once("tools.php");
	
	session_start_if_none();
	$id = sessionVar("uid");
	$name = sessionVar("uname");
?>
<html><head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

	<script src="https://kit.fontawesome.com/be068f1c80.js" crossorigin="anonymous" async></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mypage</title>
    </head>
    <body style= "margin-top: 8%;">
        <div class="mp1-box" style="background: #ADC6FF;">
            <img class="mp1-profile"> </div>
           
            <span class="mp1-txt">
            <?= $name ?>
              </span>
              님 로그인
              <button class="mp1-btn-123"
          type="button" onclick="location.href='<?= MEMBER_PATH ?>/15-09_member_update.php'">
				
      설정
  </button>
    <div class="mp1-long1"></div>
		<div class="mp1-accordion-box">
   <ul class="mp1-list">
   
     <li>
      <p class="mp1-title">&nbsp;&nbsp;&nbsp;영양제 관리</p>
      <div class="mp1-con">
		 <div class="mp1-boxx">
			 <p class="mp1-txt-1"><?php echo $_POST[id] ?></p>
			  <p style="color:#4682b4;"class="mp1-txt-1"><?php echo $_POST[when1] ?></p>
			 <p class="mp1-txt-1"><?php echo $_POST[when2] ?></p>
             <button class="mp1-btn4" type="button" onclick="location.href='medicine.php'">설정</button></div>
		  <div class="mp1-boxx">
			 <p class="mp1-txt-1"><?php echo $_POST[id] ?></p>
			  <p style="color:#4682b4;"class="mp1-txt-1"><?php echo $_POST[when1] ?></p>
			 <p class="mp1-txt-1"><?php echo $_POST[when2] ?></p>
             <button class="mp1-btn4" type="button" onclick="location.href='medicine.php'">설정</button></div>
		  <div class="mp1-boxx">
			 <p class="mp1-txt-1"><?php echo $_POST[id] ?></p>
			  <p style="color:#4682b4;"class="mp1-txt-1"><?php echo $_POST[when1] ?></p>
			 <p class="mp1-txt-1"><?php echo $_POST[when2] ?></p>
             <button class="mp1-btn4" type="button" onclick="location.href='medicine.php'">설정</button></div>
		 </div> 
    </li>
	    <div class="mp1-long2"></div>
	   <li>
      <p class="mp1-title">&nbsp;&nbsp;&nbsp;내가 작성한 글</p>
      <div class="mp1-con">
		 <div class="mp1-boxxx">
			 <p class="mp1-txt-3">질문사항</p>
			 <p style="font-size:15px;">2021.10.07</p>
			<p style="margin-left:10%"; class="mp1-txt-4">이 영양제 효과 어떤가요</p>
		  </div>
          <div class="mp1-boxxx">
            <p class="mp1-txt-3">질문사항</p>
            <p style="font-size:15px;">2021.10.07</p>
           <p style="margin-left:10%"; class="mp1-txt-4">이 영양제 효과 어떤가요</p>
         </div>
         <div class="mp1-boxxx">
            <p class="mp1-txt-3">질문사항</p>
            <p style="font-size:15px;">2021.10.07</p>
           <p style="margin-left:10%"; class="mp1-txt-4">이 영양제 효과 어떤가요</p>
         </div>
    </li>
    </ul>
</div>
<form action="<?= MEMBER_PATH ?>/logout.php" method="post">
<button class="mp1-btn-1234" type="submit">로그아웃</button>
		
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
	<script src="js/mypage-menu.js"></script>
  </html>