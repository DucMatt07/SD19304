<?php

class TinTucController
{
    public $modelTinTuc;

    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }

    // Hiển thị danh sách tin tức
    public function ListTinTuc()
    {
        $tinTucs = $this->modelTinTuc->getAll();
        require_once './views/TinTucs/ListTinTuc.php';
    }

    // Hiển thị form tạo tin tức
    public function Cre()
    {
        require_once './views/TinTucs/CreateTinTuc.php';
    }

    // Xử lý thêm tin tức
    public function handleCre()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_xuat_ban = $_POST['ngay_xuat_ban'];
            $trang_thai = $_POST['trang_thai'];

            // Xử lý tải lên hình ảnh
         
            $hinh_anh = null;
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);

                // Di chuyển file đến thư mục uploads
                if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                    $hinh_anh = $target_file; 
                } else {
                    echo "Xin lỗi, đã xảy ra lỗi khi tải lên hình ảnh của bạn.";
                }
            }


            $Error = [];
            if (empty($tieu_de)) {
                $Error['tieu_de'] = 'Nhập tiêu đề';
            }
            if (empty($noi_dung)) {
                $Error['noi_dung'] = 'Nhập nội dung';
            }

            if (empty($Error)) {
                $this->modelTinTuc->CreateTinTuc($tieu_de, $noi_dung, $ngay_xuat_ban, $hinh_anh, $trang_thai);
                unset($_SESSION['Error']);
                // echo"thêm thành công";
                header('Location: ?act=tin-tucs');
                exit();
               
            } else {
                $_SESSION['Error'] = $Error;
                header('Location: ?act=form-add-tin-tuc');
                exit();
            }
        }
    }


    // Hiển thị form cập nhật tin tức
    public function ShowUpdate()
    {
        $id = $_GET['id'];
        // var_dump($id);die;
        $tinTuc = $this->modelTinTuc->DetailUpdate($id);
        require_once './views/TinTucs/UpdateTinTuc.php';
    }

    // Xử lý cập nhật tin tức
    public function handleUpdate()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['tin_tuc_id'];

        $tieu_de = $_POST['tieu_de'];
        $noi_dung = $_POST['noi_dung'];
        $ngay_xuat_ban = $_POST['ngay_xuat_ban']; 
        $trang_thai = $_POST['trang_thai'];

      
        // Xử lý tải lên hình ảnh nếu có
        $hinh_anh = null;
        if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);

            // Kiểm tra xem có phải là hình ảnh không
            $check = getimagesize($_FILES["hinh_anh"]["tmp_name"]);
            if ($check !== false) {
                // Di chuyển file vào thư mục uploads
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                $hinh_anh = $target_file; // Lưu đường dẫn file
            } else {
                echo "File không phải là hình ảnh.";
                return;
            }
        } else {
            // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
            $tinTuc = $this->modelTinTuc->DetailUpdate($id);
            $hinh_anh = $tinTuc['hinh_anh']; // Giữ lại hình ảnh cũ
        }

        // Kiểm tra lỗi
        $Error = [];
        if (empty($tieu_de)) {
            $Error['tieu_de'] = 'Tiêu đề là bắt buộc';
        }
        if (empty($noi_dung)) {
            $Error['noi_dung'] = 'Nội dung là bắt buộc';
        }
        if (empty($ngay_xuat_ban)) {
            $Error['ngay_xuat_ban'] = 'Ngày xuất bản là bắt buộc'; 
        }

        if (empty($Error)) {
            $this->modelTinTuc->UpdateTinTuc($id, $tieu_de, $noi_dung, $ngay_xuat_ban, $hinh_anh, $trang_thai);
            unset($_SESSION['Error']);
                // echo"thêm thành công";
                header('Location: ?act=tin-tucs');
                exit();
        
        } else {
            $_SESSION['Error'] = $Error;
            header("Location: ?act=form-update-tin-tuc&id=$id");
            exit();
        }
    }
}



    // Xử lý xóa tin tức
    public function Delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id']; 
            $this->modelTinTuc->deleteData($id); 
            header('Location: ?act=tin-tucs'); 
            exit(); // 
        }
    }
}
