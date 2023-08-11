<h4 class="fw-bold py-3 mb-4">Quản lí sản phẩm</h4>
<div class="card">
    <h5 class="card-header">Danh sách sản phẩm</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($productList as $key => $value) {
                    extract($value) ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $_id ?></strong></td>
                        <td><?php echo $_nameVN ?></td>
                        <td class="text-wrap overflow-hidden">
                            <?php echo $_descriptionVN ?>
                        </td>
                        <td><span class="badge bg-label-success me-1"><?php echo number_format($_price, 0, ',', ',') ?></span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo _WEB."/admin/ProductManage/edit/$_id"?>"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Xóa</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>