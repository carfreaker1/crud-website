<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../datatable_css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../datatable_css/buttons.dataTables.min.css"> 
    <title>Admin Panel</title>
  </head>
  <body>
    <?php
    include("../navbar.php");
require_once '../dbconnection.php';

    ?>

<?php
    if (isset($_SESSION['status']) == 'Succes') {

        ?>

        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>You Have Submitted Your Form Sucessfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
        <?php
        unset($_SESSION['status']);
    }
    ?>



    <?php
    if (isset($_SESSION['update']) == 'Sucess') {

        ?>

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>You Have Update Your Form Sucessfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'

        <?php
        unset($_SESSION['update']);
    }
    ?>



    <?php
    if (isset($_SESSION['delete']) == 'Sucess') {

        ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>You Have Delete Your Form Sucessfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'

        <?php
        unset($_SESSION['delete']);
    }
    ?>


<h2 style=" background: #f09433; 
background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );"class="text-white">Your Submitted Forms</h2>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $logos = mysqli_query($conn, "SELECT * FROM `logo`");
            $sno = 0;
            while ($logo = mysqli_fetch_array($logos)) {
                $sno = $sno + 1;
                ?>
                <tr>


                    <td>
                        <?php echo "$sno"; ?>
                    </td>
                    <td>
                        <?php echo $logo['name']; ?>
                    </td>

                    
                   <td>
                       <img style="width:50px": src="../upload/<?php echo $logo['image']; ?>" alt=""> 
                    </td>
                    <td>
                        <a class='btn btn-sm btn-primary mb-3'
                            href="../websitelogo/editlogo.php?id=<?php echo urlencode(openssl_encrypt($logo['id'], 'AES-128-ECB', 'your_secret_key')); ?>">Edit</a>

                        <a class='btn btn-sm btn-primary' href="../websitelogo/deletelogo.php?id=<?php echo urlencode(openssl_encrypt($logo['id'], 'AES-128-ECB', 'your_secret_key')); ?>"
                            class='del_btn'>Delete</a>
                    </td>
                    <!-- <td>
                        <?php
                        if ($row['status'] == 1 ) {
                            echo '<a class="btn btn-sm btn-success" href="status.php?id=' . $logo['id'] . '&status=1">Active</a>';
                        } else {
                            echo '<a class="btn btn-sm btn-danger" href="status.php?id=' . $logo['id'] . '&status=0">Inactive</a>';
                        }
                        ?>
                    </td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="alert alert-success" role="alert" mt-3 style=" background: #f09433; 
background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );">
        <strong><a class="text-white"   target="_blank" onclick="return confirm('This link will take you to an external web site.')"
                href="new_form.php" style="display: flex; justify-content : center">Click Here
                to
                Submit
                New Form
            </a></strong>
    </div>
<!-- 
    <script src="./new_form_js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="../datatablecdns/jquery-3.7.0.js"></script>
    <script src="../datatablecdns/buttons.print.min.js"></script>
    <script src="../datatablecdns/dataTables.buttons.min.js"></script>
    <script src="../datatablecdns/jquery.dataTables.min.js"></script>




    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>
        <!-- onclick="function aman()" -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->


  </body>
</html>