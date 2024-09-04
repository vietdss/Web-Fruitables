<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
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
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <div class="card-title">Form Elements</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="productName">Tên sản phẩm</label>
                                            <input type="text" name="ProductName" value="<?php echo $data['product']['ProductName']; ?>" class="form-control" id="productName" placeholder="Tên sản phẩm" />
                                        </div>
                                        <div class="form-group">
                                            <label for="productImage">Ảnh</label>
                                            <input type="file" name="Image" class="form-control-file" id="productImage">
                                        </div>
                                        <div class="form-group">
                                            <label for="categorySelect">Loại sản phẩm</label>
                                            <select name="CategoryId" class="form-select form-control" id="categorySelect">
                                                <?php foreach ($data['categories'] as $category) { ?>
                                                    <option value="<?php echo $category['Id']; ?>" <?php echo $category['Id'] == $data['product']['CategoryID'] ? 'selected' : ''; ?>>
                                                        <?php echo $category['CategoryName']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="productQuantity">Số lượng</label>
                                            <input type="text" name="Quantity" value="<?php echo $data['product']['Quantity']; ?>" class="form-control" id="productQuantity" placeholder="Số lượng" />
                                        </div>
                                        <div class="form-group">
                                            <label for="productPrice">Giá</label>
                                            <input type="text" name="Price" value="<?php echo $data['product']['Price']; ?>" class="form-control" id="productPrice" placeholder="Giá" />
                                        </div>
                                        <div class="form-group">
                                            <label for="productDescription">Mô tả</label>
                                            <textarea name="Description" class="form-control" id="productDescription" rows="5"><?php echo $data['product']['Description']; ?></textarea>
                                        </div>
                                    </div>
                             
                            </div>

                        </div>
                        <div class="card-action">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>