<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Content/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="Content/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="Content/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Content/assets/css/style.css" rel="stylesheet">


</head>

<body>

    <?php
    session_start();

    
    require "./Config/Database.php";

    require "./Models/BaseModel.php";

    require "./Controllers/BaseController.php";
  
    include("./Views/header.php");
    $controllerName = strtolower($_REQUEST['controller']) . 'Controller';
    $action = strtolower($_REQUEST['action'] ?? 'index');
    require "./Controllers/${controllerName}.php";
    $controllerObject = new $controllerName;
    $controllerObject->$action();
    include("./Views/footer.php");
    ?>





    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Content/assets/lib/easing/easing.min.js"></script>
    <script src="Content/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="Content/assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="Content/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function() {
 

      document.querySelectorAll('.deleteRowModel').forEach(function(button) {
        button.addEventListener('click', function() {
          var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
          deleteModal.show();

          var productId = this.closest('tr').getAttribute('data-product-id');
          document.getElementById('confirmDelete').setAttribute('data-product-id', productId);
        });
      });

      document.getElementById('confirmDelete').addEventListener('click', function() {
        var productId = this.getAttribute('data-product-id');
        var deleteUrl = './index.php?controller=cart&action=delete&id=' + productId;

        // Gửi yêu cầu AJAX để xóa sản phẩm
        var xhr = new XMLHttpRequest();
        xhr.open('GET', deleteUrl, true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // Ẩn modal
              var deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            deleteModal.hide();
            // Xóa hàng tương ứng khỏi bảng
            var row = document.querySelector('tr[data-product-id="' + productId + '"]');
            row.parentNode.removeChild(row);

            // Cập nhật lại DataTable
            table.row(row).remove().draw(false);

          
          }
        };
        xhr.send();
      });
    });
  </script>
    <!-- Template Javascript -->
    <script src="Content/assets/js/main.js"></script>

</body>

</html>