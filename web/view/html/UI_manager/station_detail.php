<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view\style\base.css">
    <link rel="stylesheet" href="view\style\style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>bike detail</title>
    <!-- important! google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- data table link boostrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>    
        $(document).ready(function () {
            $('#bikeTable').DataTable({
                search: {
                    return: true,
                },
            });
        });
    </script>
</head>
<body>
    <?php
        $bikeList = json_decode($bikeList);
    ?>
    <div class="container-fluid">
        <div class="row mw-100">
            <!-- vertical navbar -->
            <div class="col-md-auto background-primary-color vh-100 nopadding">
                <!-- project name -->
                <div class="project d-flex align-items-center">
                    <img src="assets\img\project-logo.png" alt="prjLogo" class="project-logo">
                    <div class="project-name margin-left-10 ">
                        <h4 class="text-white">TRẠM XE <br> THÔNG MINH</h4>
                    </div>
                </div>
                <!-- logined user -->
                <div class="logined-user d-flex align-items-center">
                    <img src="assets\img\294488601_3134523420097821_7397663236363416758_n.jpg" alt="admin-avatar" class="user-img">
                    <div class="user-name margin-left-20">
                        <h6 class="text-white">ADMIN</h6>
                    </div>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person text-white" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/user_webpage">Quản lý nhân viên</a>
                    </li>
                    <li class="nav-item d-flex align-items-center selected" id='stationList'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list text-white" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding " href="/station_list">Danh sách trạm</a>
                    </li>
                    <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell text-white" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="">Báo cáo tình trạng xe</a>
                    </li>
                    <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-thermometer-sun text-white" viewBox="0 0 16 16">
                            <path d="M5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585A1.5 1.5 0 0 1 5 12.5z"/>
                            <path d="M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5zm4.243 1.757a.5.5 0 0 1 0 .707l-.707.708a.5.5 0 1 1-.708-.708l.708-.707a.5.5 0 0 1 .707 0zM8 5.5a.5.5 0 0 1 .5-.5 3 3 0 1 1 0 6 .5.5 0 0 1 0-1 2 2 0 0 0 0-4 .5.5 0 0 1-.5-.5zM12.5 8a.5.5 0 0 1 .5-.5h1a.5.5 0 1 1 0 1h-1a.5.5 0 0 1-.5-.5zm-1.172 2.828a.5.5 0 0 1 .708 0l.707.708a.5.5 0 0 1-.707.707l-.708-.707a.5.5 0 0 1 0-.708zM8.5 12a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/environment">Tình trạng môi trường</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt text-white" viewBox="0 0 16 16">
                            <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/revenue">Doanh thu</a>
                    </li>
                    <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear text-white" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="#">Thiết lập</a>
                    </li>
                    <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/logout">Đăng xuất</a>
                    </li>
                    
                </ul>
            </div>

            <!-- content -->
            <div class="content col vh-100" id="mainContent">
                <!-- start: breadcrum -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="link-dark" href="/station_list">Danh sách trạm</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $stationName; ?></li>
                    </ol>
                </nav>
                <!-- end: breadcrum -->

                <!-- page content -->
                <!-- begin: station list table -->
                <table class="table table-striped table-hover" id="bikeTable">
                    <thead>
                      <tr>         
                        <th class='text-center' scope="col">ID </th>
                        <th class='text-center' scope="col">Tên xe</th>
                        <th class='text-center' scope="col">Số giờ thuê</th>
                        <th class='text-center' scope="col">Giá thuê</th>
                        <th class='text-center' scope="col">Tình trạng</th>
                        <th class='text-center' scope="col">Tác vụ</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($bikeList as $bike) {
                                $bike = json_decode($bike);
                                echo '
                                <tr class="text-center">
                                    <th scope="row">'.$bike->id.'</th>
                                    <td>
                                        <a href="/bike-detail/'.UrlNormal($bike->name).'/'.$bike->id.'" style="text-decoration: none;" class="link-dark">'.$bike->name.'</a>
                                    </td>
                                    <td>'.$bike->hired_hours.'</td>
                                    <td>'.$bike->price.'đ/1h</td>
                                    <td>'.$bike->status.'</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                                        <button type="button" class="btn btn-sm btn-danger">Xóa</button>
                                    </td>
                                </tr>
                                ';

                            }
                        ?>
                        
                    </tbody>
                </table>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-sm btn-primary">Thêm xe mới</button>
                <!-- end: station list table -->
            </div>
            
            <!--begin: add modal -->
            <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Thêm xe mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?controller=manager&action=addBike" method='post' id="addBike">
                                <!-- station ID -->
                                <div class="form-group">
                                    <label for="bikeID">ID</label>
                                    <input type="text" class="form-control" id="bikeID" name="bikeID" placeholder="Nhập ID" value="<?php if(isset($_POST['bikeID'])) echo $_POST['bikeID']; ?>">
                                    <p class="text-danger">
                                        <?php
                                            if (isset($errResultAdd))
                                                switch ($errResultAdd->idErrAdd) {
                                                    case 'duplicate':
                                                        echo "ID đã được đăng ký";
                                                        break;
                                                    case 'missing':
                                                        echo "Xin hãy nhập ID xe!";
                                                        break;
                                                    default: break;
                                                }
                                        ?>
                                    </p>
                                </div>
                                <!-- bike name -->
                                <div class="form-group">
                                    <label for="bikeName">Tên xe</label>
                                    <input type="text" class="form-control" id="bikeName" name="bikeName" placeholder="Nhập tên xe" value="<?php if(isset($_POST['bikeName'])) echo $_POST['bikeName']; ?>">
                                    <p class="text-danger">
                                        <?php
                                            if (isset($errResultAdd))
                                                switch ($errResultAdd->nameErrAdd) {
                                                    case 'invalid':
                                                        echo "Tên xe không hợp lệ";
                                                        break;
                                                    default: break;
                                                }
                                        ?>
                                    </p>
                                </div>
                                <!-- rent Price -->
                                <div class="form-group">
                                    <label for="rentPrice">Giá cho thuê</label>
                                    <input type="number" class="form-control" id="rentPrice" name="rentPrice" placeholder="Nhập giá cho thuê" value="<?php if(isset($_POST['rentPrice'])) echo $_POST['rentPrice']; ?>">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div>
                                <!-- bike img -->
                                <div class="form-group">
                                    <label for="bikeImg">Link ảnh</label>
                                    <input type="text" class="form-control" id="bikeImg" name="bikeImg" placeholder="Nhập url dẫn tới ảnh của xe" value="<?php if(isset($_POST['bikeImg'])) echo $_POST['bikeImg']; ?>">
                                    <p class="text-danger">
                                        <?php
                                           
                                        ?>
                                    </p>
                                </div>
                                <!-- bike paint -->
                                <div class="form-group">
                                    <label for="bikePaint">Chất liệu sơn</label>
                                    <input type="text" class="form-control" id="bikePaint" name="bikePaint" placeholder="Nhập chất liệu sơn">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div>
                                <!-- bike size -->
                                <div class="form-group">
                                    <label for="bikeSize">Kích thước xe</label>
                                    <input type="text" class="form-control" id="bikeSize" name="bikeSize" placeholder="Nhập kích thước xe, cú pháp size_x - size_y - size_z">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div> 

                                <!-- bike weight -->
                                <div class="form-group">
                                    <label for="bikeWeight">Trọng lượng xe</label>
                                    <input type="number" class="form-control" id="bikeWeight" name="bikeWeight" placeholder="Nhập trọng lượng xe">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div>
                                
                                <!-- bike payload -->
                                <div class="form-group">
                                    <label for="bikePayload">Tải trọng nguyên xe</label>
                                    <input type="number" class="form-control" id="bikePayload" name="bikePayload" placeholder="Nhập tải trọng của xe">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div>  

                                <!-- recommend height-->
                                <div class="form-group">
                                    <label for="recommendHeight">Chiều cao khuyến nghị</label>
                                    <input type="number" class="form-control" id="recommendHeight" name="recommendHeight" placeholder="Nhập chiều cao khuyến nghị cho người dùng">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div>  

                                <!-- utilities -->
                                <div class="form-group">
                                    <label for="utilities">Tiện ích</label>
                                    <input type="text" class="form-control" id="utilities" name="utilities" placeholder="Nhập tiện ích của xe">
                                    <p class="text-danger">
                                        <?php
                                            
                                        ?>
                                    </p>
                                </div> 
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" onclick='document.getElementById("addStation").submit();'>Xác nhận thêm</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!--end: add modal -->

            <!-- end: content -->
        </div>
    </div>

        
    </script>
</body>
</html>