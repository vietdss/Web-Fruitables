<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">DataTables.Net</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <a href="../admin/index.php?controller=product&action=add" class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add Row</h4>
                            <button class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Thêm sản phẩm
                            </button>
                        </div>
                    </a>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Mô tả</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data['products'] as $product) { ?>
                                        <tr data-product-id="<?php echo $product['Id']; ?>">
                                            <td><?php echo $product['Id'] ?></td>
                                            <td><?php echo $product['ProductName'] ?></td>
                                            <td><img src='../Content/assets/img/<?php echo $product['Image'] ?>' width='100'></td>
                                            <td><?php echo $product['Price'] ?></td>
                                            <td><?php echo $product['Quantity'] ?></td>
                                            <td><?php echo $product['Description'] ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-bs-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary btn-lg">
                                                        <a href="../admin/index.php?controller=product&action=edit&id=<?php echo $product['Id'] ?>"><i class="fa fa-edit"></i></a>
                                                    </button>
                                                    <button type="button" data-bs-toggle="tooltip" title="Remove" class="btn btn-link btn-danger deleteRowModel">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa mục này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
                </div>
            </div>
        </div>
    </div>

   