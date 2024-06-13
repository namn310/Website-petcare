 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

   <div class="d-flex align-items-center justify-content-between">
     <a href="index.php" style="text-decoration: none;" class="logo d-flex align-items-center">
       <img src="/../Project-petcare-php/assets/img/PetCARE.png" alt="">
       <span class="d-none d-lg-block">Admin</span>
     </a>
     <i class="bi bi-list toggle-sidebar-btn"></i>
   </div><!-- End Logo -->

   <div class="search-bar">
     <form class="search-form d-flex align-items-center" method="POST" action="#">
       <input type="text" name="query" placeholder="Search" title="Enter search keyword">
       <button type="submit" title="Search"><i class="bi bi-search"></i></button>
     </form>
   </div><!-- End Search Bar -->

   <nav class="header-nav ms-auto">
     <ul class="d-flex align-items-center">

       <li class="nav-item d-block d-lg-none">
         <a class="nav-link nav-icon search-bar-toggle " href="#">
           <i class="bi bi-search"></i>
         </a>
       </li><!-- End Search Icon-->

       <li class="nav-item dropdown">

         <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
           <i class="bi bi-bell"></i>
           <span class="badge bg-primary badge-number">4</span>
         </a><!-- End Notification Icon -->

         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
           <li class="dropdown-header">
             Bạn có 4 thông báo mới
             <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Xem tất cả</span></a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="notification-item">
             <i class="bi bi-exclamation-circle text-warning"></i>
             <div>
               <h4>Quản lí</h4>
               <p>Tấn chôm tiền đi bắn bi-a</p>
               <p>30 phút trước</p>
             </div>
           </li>

           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="notification-item">
             <i class="bi bi-x-circle text-danger"></i>
             <div>
               <h4>Cảnh báo</h4>
               <p>Có 4 nhân viên đến muộn hôm nay</p>
               <p>1 giờ trước</p>
             </div>
           </li>

           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="notification-item">
             <i class="bi bi-check-circle text-success"></i>
             <div>
               <h4>Thông báo</h4>
               <p>Quyết định sa thải đồng chí Tấn</p>
               <p>2 giờ trước</p>
             </div>
           </li>

           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="notification-item">
             <i class="bi bi-info-circle text-primary"></i>
             <div>
               <h4>Thông báo</h4>
               <p>Tấn dẫn các bác sĩ đi trộm chó</p>
               <p>4 giờ trước</p>
             </div>
           </li>

           <li>
             <hr class="dropdown-divider">
           </li>
           <li class="dropdown-footer">
             <a href="#">Xem tất cả thông báo</a>
           </li>

         </ul><!-- End Notification Dropdown Items -->

       </li><!-- End Notification Nav -->

       <li class="nav-item dropdown">

         <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
           <i class="bi bi-chat-left-text"></i>
           <span class="badge bg-success badge-number">3</span>
         </a><!-- End Messages Icon -->
         <style>
           .message-item a {
             text-decoration: none;
           }
         </style>
         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
           <li class="dropdown-header">
             Bạn có 3 thông báo
             <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Xem tất cả</span></a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="message-item">
             <a href="#">
               <img src="/../Project-petcare-php/assets/img/avt.jpg" alt="" class="rounded-circle">
               <div>
                 <h4>Tấn</h4>
                 <p>Nay xin nghỉ nhé</p>
                 <p>4 giờ trước</p>
               </div>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="message-item">
             <a href="#">
               <img src="/../Project-petcare-php/assets/img/avt2.png" alt="" class="rounded-circle">
               <div>
                 <h4>Nam</h4>
                 <p>Tấn xin cho tôi nghỉ rồi nhé</p>
                 <p>6 giờ trước</p>
               </div>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="message-item">
             <a href="">
               <img src="/../Project-petcare-php/assets/img/avt.jpg" alt="" class="rounded-circle">
               <div>
                 <h4>Khang</h4>
                 <p>Đơn sa thải đồng chí Tấn đến đâu rồi</p>
                 <p>8 giờ trước</p>
               </div>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li class="dropdown-footer">
             <a href="#">Hiển thị tất cả tin nhắn</a>
           </li>

         </ul><!-- End Messages Dropdown Items -->

       </li><!-- End Messages Nav -->

       <li class="nav-item dropdown pe-3">

         <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
           <img src="/../Project-petcare-php/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
           <span class="d-none d-md-block dropdown-toggle ps-2">Bùi An Khang</span>
         </a><!-- End Profile Iamge Icon -->

         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           <li class="dropdown-header">
             <h6>Bùi An Khang</h6>
             <span>Admin</span>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li>
             <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
               <i class="bi bi-person"></i>
               <span>Trang cá nhân</span>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>

           <li>
             <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
               <i class="bi bi-gear"></i>
               <span>Cài đặt tài khoản</span>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>



           <li>
             <a class="dropdown-item d-flex align-items-center" href="pages-login.php">
               <i class="bi bi-box-arrow-right"></i>
               <span>Đăng xuất</span>
             </a>
           </li>

         </ul><!-- End Profile Dropdown Items -->
       </li><!-- End Profile Nav -->

     </ul>
   </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->