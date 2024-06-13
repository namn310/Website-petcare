<?php
//load file layout.php
$this->layoutPath = "Layout.php";
?>

<div class="pagetitle">
  <h1>Danh Sách Đơn Hàng</h1>

</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="search mt-4 mb-4 input-group" style="width:50%">
      <button class="input-group-text btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
      <input class="form-control" type="text" id="searchOrders">
    </div>
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body table-responsive">

          <!-- Table with stripped rows -->
          <table class="table text-center">
            <thead>
              <tr>
                <th>
                  <b>I</b>D đơn hàng
                </th>
                <th>Khách Hàng </th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th>Tính năng</th>
              </tr>
            </thead>

            <tbody id="table-order">
              <?php
              foreach ($listRecord as $row) {
                $customer = $this->modelGetCustomers($row->customer_id);

              ?>
                <tr>
                  <td><?php echo $row->id ?></td>
                  <td><?php echo $customer->name;  ?></td>
                  <td><?php echo $customer->sodienthoai;  ?></td>
                  <td><?php echo $row->create_at;  ?></td>
                  <?php
                  if ($row->status > 0) {
                  ?>
                    <td><button class=" btn btn-success">Đã giao hàng</button> </td>
                  <?php
                  } else {
                  ?>
                    <td><button class="btn btn-danger">Chưa giao hàng</button> </td>
                  <?php
                  } ?>

                  <td>
                    <a style="color:white;text-decoration:none"> <button data-bs-toggle="modal" data-bs-target="#deleteOrder" class="btn btn-danger"> <i class="bi bi-trash"></i></button></a>
                    <?php
                    if ($row->status > 0) {
                    } else {
                    ?>

                      <a href="index.php?controller=donhang&action=delivery&id=<?php echo $row->id ?>"> <button data-bs-toggle="modal" class="btn btn-success"><i class="fa-solid fa-truck"></i></button></a>
                    <?php } ?>

                    <button class="btn btn-primary"><a style="color:white;text-decoration:none" href="index.php?controller=donhang&action=detail&id=<?php echo $row->id ?>">Xem </a></button>

                  </td>
                </tr>
              <?php
              } ?>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          <ul class="pagination">
            <li class="page-item disabled"><a href="#" class="page-link">Trang</a></li>
            <?php for ($i = 1; $i <= $numPage; $i++) { ?>
              <li class="page-item"><a href="index.php?controller=donhang&page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Button trigger modal -->


<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="fa-solid fa-check-double" style="color: #12ca27;"></i>
      <strong class="me-auto ms-2">Thông báo</strong>
      <small>Now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Đơn hàng đã được giao !
    </div>
  </div>
</div>
<!-- Modal xóa order -->
<div class="modal fade" id="deleteOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Bạn có chắc chắn muốn xóa đơn hàng này không ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <a href="index.php?controller=donhang&action=delete&id=<?php echo $row->id ?>"> <button type="button" class="btn btn-primary">Xác nhận</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Modal giao hàng -->

<div class="modal fade" id="delivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Xác nhận giao hàng</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <a href="index.php?controller=donhang&action=delivery&id=<?php echo $row->id ?>"> <button type="submit" class="btn btn-primary">Xác nhận</button></a>
      </div>
    </div>
  </div>
</div>

<!-- ======= Footer ======= -->



<script>
  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }
</script>
<script>
  $(document).ready(function() {
    $("#searchOrders").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table-order tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>