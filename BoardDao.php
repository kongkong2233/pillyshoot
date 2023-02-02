<?php
class BoardDao {
    private $db;    // PDO 객체를 저장하기 위한 프로퍼티

    // DB에 접속하고 PDO 객체를 $db에 저장
    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=127.0.0.1;port=3307;dbname=200_phpdb",
                                "php", "1234");
            $this->db->setAttribute(PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // 게시판의 전체 글 수(전체 레코드 수) 반환
    public function getNumMsgs() {
        try {
            $query = $this->db->prepare("select count(*)
                                         from s_board");
            $query->execute();
            
            $numMsgs = $query->fetchColumn();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

        return $numMsgs;
    }

    // $num번 게시글의 데이터 반환
    public function getMsg($num) {
        try {
            $query = $this->db->prepare("select * from s_board
                                         where num=:num");
                                         
            $query->bindValue(":num", $num, PDO::PARAM_INT);
            $query->execute();
            
            $msg = $query->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

        return $msg;
    }

    // $start번부터 $rows 개의 게시글 데이터 반환(2차원 배열)
    public function getManyMsgs($start, $rows) {
        try {
            $query = $this->db->prepare("select * from s_board
                           order by num desc limit :start, :rows");
                           
            $query->bindValue(":start", $start, PDO::PARAM_INT);
            $query->bindValue(":rows", $rows, PDO::PARAM_INT);
            $query->execute();
            
            $msgs = $query->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

        return $msgs;
    }

    // 새 글을 DB에 추가
    public function insertMsg($writer, $title, $content) {
        try {
            $query = $this->db->prepare("insert into s_board
                         (writer, title, content, regtime, hits)
                  values (:writer, :title, :content, :regtime, 0)");
                  
            $regtime = date("Y-m-d H:i");
            $query->bindValue(":writer",  $writer,  PDO::PARAM_STR);
            $query->bindValue(":title" ,  $title ,  PDO::PARAM_STR);
            $query->bindValue(":content", $content, PDO::PARAM_STR);
            $query->bindValue(":regtime", $regtime, PDO::PARAM_STR);
            $query->execute();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // $num번 게시글 업데이트
    public function updateMsg($num, $writer, $title, $content) {
        try {
            $query = $this->db->prepare("update s_board set
                                  writer=:writer, title=:title,
                                  content=:content, regtime=:regtime
                                  where num=:num");

            $regtime = date("Y-m-d H:i");
            $query->bindValue(":writer",  $writer,  PDO::PARAM_STR);
            $query->bindValue(":title" ,  $title ,  PDO::PARAM_STR);
            $query->bindValue(":content", $content, PDO::PARAM_STR);
            $query->bindValue(":regtime", $regtime, PDO::PARAM_STR);
            $query->bindValue(":num", $num, PDO::PARAM_INT);
            $query->execute();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // $num번 게시글 삭제
    public function deleteMsg($num) {
        try {
            $query = $this->db->prepare("delete from s_board
                                         where num=:num");
                                         
            $query->bindValue(":num", $num, PDO::PARAM_INT);
            $query->execute();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // $num번 게시글의 조회 수 1 증가
    public function increaseHits($num) {
        try {
            $query = $this->db->prepare("update s_board set
                                       hits=hits+1 where num=:num");
                                       
            $query->bindValue(":num", $num, PDO::PARAM_INT);
            $query->execute();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>