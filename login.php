<?php
// 데이터베이스 연결 설정
$host = "localhost";
$db_name = "users";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Connection failed: " . $exception->getMessage());
}

// 사용자 입력 받기
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET["username"];
    $password = $_GET["password"];

    // 입력값 검증
    if (empty($username) || empty($password)) {
        echo "모든 필드를 채워주세요.";
    } else {
        // 데이터베이스에서 사용자 정보 확인
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // 사용자가 존재하는지 확인
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // 비밀번호 확인
            if ($password==$row['pw']) {
                echo "로그인 성공!";
            } else {
                echo "잘못된 비밀번호입니다.";
            }
        } else {
            echo "존재하지 않는 사용자입니다.";
        }
    }
}
?>
