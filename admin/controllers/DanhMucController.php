<?php



class DanhMucController
{

    // Connect models

    public $modelDanhMuc;

    public function __construct()
    {
      $this->modelDanhMuc = new DanhMuc();
    }

    // Danh sách 
    public function ListCate() {
        // echo 'Hello world';

        $danhMucs = $this->modelDanhMuc->getAll();
        // var_dump($danhMucs);

        require_once './views/DanhMucs/ListDanhMuc.php';
    }

    // Hiển thị form cre
    public function Cre() {
        require_once './views/DanhMucs/CreateDanhMuc.php';
    }

    // Xử lý logic 
    public function handleCre() {
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

            // var_dump($trang_thai);

            //Validate
            $Error = [];

            if(empty($ten_danh_muc)){
                $Error['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($trang_thai)){
                $Error['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            if(empty($Error)){
                $this->modelDanhMuc->CreateCate($ten_danh_muc, $mo_ta, $trang_thai);
                unset($_SESSION['Error']);
                // Thêm đoạn mã HTML và JavaScript để hiển thị thông báo
                // echo "Thêm thành công";
                header('Location: ?act=danh-mucs');
                exit();
            }else{
                $_SESSION['Error'] = $Error;
                header('Location: ?act=form-danh-muc'); // Sửa lại khoảng trắng
                exit();
            }
            
            
            

        }
    }

     // Hiển thị form update
    public function ShowUpdate() {

        $id = $_GET['danh_muc_id'];
        $danhMucw = $this->modelDanhMuc->DetailUpdate($id);

        // var_dump($danhMucw);
        require_once './views/DanhMucs/UpdateDanhMuc.php';
    }

     // Xử lý logic update
     public function handleUpdate() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
 
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];

            // var_dump($trang_thai);

            //Validate
            $Error = [];

            if(empty($ten_danh_muc)){
                $Error['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($trang_thai)){
                $Error['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            if(empty($Error)){
                $this->modelDanhMuc->UpdateCate($id,$ten_danh_muc, $mo_ta, $trang_thai);
                unset($_SESSION['Error']);
                // Thêm đoạn mã HTML và JavaScript để hiển thị thông báo
                // echo "Thêm thành công";
                header('Location: ?act=danh-mucs');
                exit();
            }else{
                $_SESSION['Error'] = $Error;
                header('Location: ?act=form-sua-danh-muc'); // Sửa lại khoảng trắng
                exit();
            }
            
            
            

        }

     }

      // Xử lý xóa
    public function Delete() {

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['danh_muc_id'];
            // var_dump($id);

            $deleteDanhmuc = $this->modelDanhMuc->deleteData($id);
            // echo'them thna ckgn';
            header('Location: ?act=danh-mucs'); // Sửa lại khoảng trắng
            exit();
        }
    }

    // test 123 update

    
}
