<?php

class TrangThaiController
{
    //Kết nối file moddel
    public $modelTrangThai;

    public function __construct()
    {
        $this->modelTrangThai = new TrangThai();
    }
    //Hiển thị danh sách liên hệ 
    public function index(){
        //Lấy ra dữ liệu liên hệ
        $danhSachTrangThai = $this -> modelTrangThai -> getAllTrangThai();
        // var_dump($TrangThai);

     
        //Đưa dữ liệu ra view
        require_once './views/trangthai/listtrangthai.php';
    }
   

    //Hàm hiển thị form thêm
    public function create(){
        require_once './views/trangthai/create_trang_thai.php';
          

    }

    //Hàm xử lý thêm vào csdl
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu
            
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);die(); // Kiểm tra giá trị trạng thái trước khi lưu

    
            // validate
            $errors = [];
       
            
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Bạn phải nhập ngày tạo liên hệ' ;
            }
            if (empty($errors)) {
                # nếu không có lỗi thì thêm dữ liệu
                $this->modelTrangThai->postData( $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=trang-thai');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-add-trang-thai');
                exit();
            }
        }


    }

    //Hàm hiển thị form sửa
    public function edit(){
        //lấy id
        $id = $_GET['trang_thai_id'];
        // lấy thông tin chi tiết của danh mục
        $trangThai = $this -> modelTrangThai->getDeltailData($id);
        require_once './views/trangthai/edit_trang_thai.php';



    }

    //Hàm xử lý cập nhật dữ liệu vào csdl
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];
            // var_dump($trang_thai);die()

            // validate
            $errors = [];
       
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Bạn phải chọn trạng thái' ;
            }
            if (empty($errors)) {
                # nếu không có lỗi thì thêm dữ liệu
                $this->modelTrangThai->updateData($id, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=trang-thai');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-update-trang-thai');
                exit();
            }
        }

    }

    //Hàm xử lý xóa dữ liệu vào csdl
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['trang_thai_id'];

            //xóa danh mục
          $this->modelTrangThai->deleteData($id);
            header('Location: ?act=trang-thai');
            exit();
    }

}
}
