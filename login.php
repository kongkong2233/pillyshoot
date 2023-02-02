<?php
	require_once("tools.php");
	
	// 사용자 아이디와 이름을 담은 세션 변수 읽기
	
	session_start_if_none();
	$id = sessionVar("uid");
	$name = sessionVar("uname");
	$email = requestValue("email");

?>

<?php 
  include 'login_head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>login</title>
	<script src="https://kit.fontawesome.com/be068f1c80.js" crossorigin="anonymous" async></script>
</head>

<body>
	
	<?php  if ( $id ) : goNow('mypage-1.php') //로그인 상태일 때의 출력 ?>
	
	<?php else : //로그인 되지 않은 상태일 때의 출력 ?>
    <form id="login-form" action="<?= MEMBER_PATH ?>/15-04_login.php" method="post">
        <div class="id_pw__wrap">
            <div class="input__row">
                <input type="text" id="id" name="id" class="input__text" title="아이디" maxlength="30" placeholder="ID"
                    value>
            </div>

            <div class="input__row">
                <input type="password" id="" name="pw" placeholder="Password" title="비밀번호" class="input__text"
                    maxlength="16">
            </div>
            <div class="btn__login__wrap">
                <button type="submit" value="로그인" class="btn__login" id="log.login">
                    <span class="btn__text">
						<a href="login-1.php">로그인</a>
					</span>
                </button>
            </div>
        </div>
    </form>
	<?php endif ?>
    <div class="member" id="member">
        <a class="member_join" onclick="location.href='<?= MEMBER_PATH ?>/join.php'">회원가입</a>
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

</html><?php
	
?>