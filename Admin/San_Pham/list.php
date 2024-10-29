<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        td img {
            border-radius: 5px;
            display: flex;

        }

        td img:hover {
            transform: scale(1.1);
        }



        table td:nth-child(6) {
            width: 30%;
        }

        table td:nth-child(7) {
            width: 140px;
        }

        .bottons {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button-->
        <!-- <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a> -->
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <h3>Trang Quản Trị</h3>
            <form action="index.php?act=out" class="rows">
                <a class="app-nav__item" href="../index.php">
                    Thoát <i class='bx bx-log-out bx-rotate-180'></i>
                </a>
            </form>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../image/Shipper_CPS3.77d4065.png" width="50px" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b>Nguyễn Văn Dương</b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item " href="index.php">
                    <i class='app-menu__icon bx bxs-home'></i>
                    <span class="app-menu__label">Trang Chủ</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=add_dm">
                    <i class='app-menu__icon bx bx-task'></i>
                    <span class="app-menu__label">Danh mục</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item active" href="index.php?act=add_sp">
                    <i class='app-menu__icon bx bx-purchase-tag-alt'></i>
                    <span class="app-menu__label">Sản phẩm</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=list_client">
                    <i class='app-menu__icon bx bx-user-voice'></i>
                    <span class="app-menu__label">Khách hàng</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=statistical">
                    <i class='app-menu__icon bx bx-bar-chart-alt-2'></i>
                    <span class="app-menu__label">Thống kê</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="index.php?act=commnet">
                    <i class='app-menu__icon bx bx bx-chat'></i>
                    <span class="app-menu__label">Comment</span>
                </a>
            </li>
        </ul>
    </aside>

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Danh sách danh mục</h3>
                    <form action="index.php?act=list_sp" method="post" class="bottons">
                        <input type="text" name="kyw" id="" class="form-control_1">
                        <select name="ID_danhmuc" id="" class="form-control_1">
                            <option value="0" selected> Tất Cả</option>
                            <?php
                            foreach ($list_dm as $danhmuc) {
                                extract($danhmuc);
                                echo  '<option value="' . $ID_danhmuc . '">' . $Ten_danhmuc . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" name="listok" id="search" value="Tìm Kiếm" class="form-control_1">
                    </form>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Mã SP</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Image</th>
                                    <th>Mô Tả</th>
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($list_sp as $sanpham) {
                                extract($sanpham);
                                $sua_sp = "index.php?act=sua_sp&id=" . $ID;
                                $xoa_sp = "index.php?act=xoa_sp&id=" . $ID;
                                $hinhpath = "../upload/" . $Image;
                                if (is_file($hinhpath)) {
                                    $hinh = "<img src='" .  $hinhpath . "' height='50px'>";
                                } else {
                                    $hinh = "No image found";
                                }

                                echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>' . $ID . '</td>
                                    <td>' . $Name . '</td>
                                    <td>' . $Price . '</td>
                                    <td>' . $hinh . '</td>
                                    <td>' . $Mota . '</td>
                                    <td>
                                    <a href="' . $sua_sp . '"><input class="btn btn-primary btn-sm trash" type="button" value="Sửa"></a>
                                    <a href="' . $xoa_sp . '"><input class="btn btn-primary btn-sm edit" type="button" value="Xóa"></a>
                                    </td>
                                    </tr>';
                            }
                            ?>
                        </table>
                    </div>
                    <input class="btn btn-save" type="submit" value="Chọn Tất Cả"></input>
                    <input class="btn btn-cancel" type="reset" value="Bỏ Chọn Tất Cả">
                    <input class="btn btn-save" type="button" value="Xóa Các Mục Đã Chọn">
                    <a href="index.php?act=add_sp"><input class="btn btn-cancel" type="button" value="Nhập Thêm"></input></a>
                </div>
            </div>
        </div>
    </main>
    <script src="./"></script>
</body>

</html>