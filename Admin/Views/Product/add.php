
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
                                    <label for="largeInput">Tên sản phẩm</label>
                                    <input type="text" name="ProductName" class="form-control form-control" id="defaultInput" placeholder="Default Input" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Ảnh</label>
                                    <input type="file" name="Image" class="form-control-file" id="exampleFormControlFile1">
                                </div>

                                <div class="form-group">
                                    <label for="defaultSelect">Loại sản phẩm</label>
                                    <select name="CategoryId" class="form-select form-control" id="defaultSelect">
                                        <?php

                                        foreach ($data['categories'] as $category) {
                                        ?>
                                            <option value="<?php echo $category['Id'] ?>"><?php echo $category['CategoryName'] ?></option>


                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Số lượng</label>
                                    <input type="text" name="Quantity" name="" class="form-control form-control" id="defaultInput" placeholder="Default Input" />
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Giá</label>
                                    <input type="text" name="Price" class="form-control form-control" id="defaultInput" placeholder="Default Input" />
                                </div>
                                <div class="form-group">
                                    <label for="comment">Mô tả</label>
                                    <textarea name="Description" class="form-control" id="comment" rows="5">                          </textarea>
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