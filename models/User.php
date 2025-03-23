<?php
class User
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT*FROM nguoi_dungs WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['vai_tro'] == 2) {

                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "Tài khoản bị cấm";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Sai tài khoản hoặc mật khẩu";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }
    public function createUser($ten_nguoi_dung, $email, $mat_khau , $vai_tro = '2')
    {
        try {
            // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                return "Email đã tồn tại!";
            } else {
                // Mã hóa mật khẩu
                $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
    
                // Thực hiện chèn người dùng mới vào cơ sở dữ liệu
                $sql = "INSERT INTO nguoi_dungs (ten_nguoi_dung, email, mat_khau, vai_tro) 
                    VALUES (:ten_nguoi_dung, :email, :mat_khau, :vai_tro)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':mat_khau', $hashed_password);
                $stmt->bindParam(':vai_tro', $vai_tro);

                $stmt->execute();
    
                return "Đăng ký thành công!";
            }
        } catch (PDOException $e) {
            return 'Lỗi: ' . $e->getMessage();
        }
    }
    
    public function getUserFormEmail($email)
    {
        try {
            $sql = "SELECT*FROM nguoi_dungs WHERE email=:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }

    // Cập nhật thông tin người dùng
    public function getUserByEmail($email)
{
    try {
        $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

public function updateUserProfile($email, $ten_nguoi_dung, $sdt, $dia_chi, $ngay_sinh, $gioi_tinh, $mat_khau = null, $avatar = null)
{
    try {
        // Cập nhật thông tin người dùng
        $sql = "UPDATE nguoi_dungs SET 
                    ten_nguoi_dung = :ten_nguoi_dung, 
                    sdt = :sdt, 
                    dia_chi = :dia_chi, 
                    ngay_sinh = :ngay_sinh, 
                    gioi_tinh = :gioi_tinh";

        // Nếu có mật khẩu mới, thêm mật khẩu vào câu lệnh SQL
        if ($mat_khau) {
            $sql .= ", mat_khau = :mat_khau";
        }

        // Nếu có avatar mới, thêm avatar vào câu lệnh SQL
        if ($avatar) {
            $sql .= ", avatar = :avatar";
        }

        $sql .= " WHERE email = :email";

        $stmt = $this->conn->prepare($sql);

        // Bind các giá trị
        $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':email', $email);

        // Bind mật khẩu nếu có
        if ($mat_khau) {
            $stmt->bindParam(':mat_khau', $mat_khau);
        }

        // Bind avatar nếu có
        if ($avatar) {
            $stmt->bindParam(':avatar', $avatar);
        }

        // Thực thi câu lệnh SQL
        return $stmt->execute();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}



}
