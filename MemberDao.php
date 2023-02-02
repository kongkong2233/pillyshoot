<?php 
  include 'login_head.php';
?>

<?php
class MemberDao {
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

    // 아이디가 $id인 레코드 반환
    public function getMember($id) {
        try {
            $query = $this->db->prepare("select * from s_member
                                         where id = :id");
            $query->bindValue(":id", $id, PDO::PARAM_STR);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

        return $result;
    }

    // 회원 정보 추가
    public function insertMember($id, $pw, $email, $name) {
        try {
            $query = $this->db->prepare("insert into s_member
                                         values (:id, :pw, :email, :name)");

            $query->bindValue(":id",   $id,   PDO::PARAM_STR);
            $query->bindValue(":pw" ,  $pw,   PDO::PARAM_STR);
			$query->bindValue(":email", $email, PDO::PARAM_STR);
            $query->bindValue(":name", $name, PDO::PARAM_STR);
            $query->execute();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // 아이디가 $id인 회원 정보 업데이트
    public function updateMember($id, $pw, $name, $email) {
        try {
            $query = $this->db->prepare("update s_member set
                                  pw=:pw, email=:email, name=:name where id=:id");
                                         
            $query->bindValue(":id",   $id,   PDO::PARAM_STR);
            $query->bindValue(":pw" ,  $pw,   PDO::PARAM_STR);
			$query->bindValue(":email", $email, PDO::PARAM_STR);
            $query->bindValue(":name", $name, PDO::PARAM_STR);
            $query->execute();
            
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>