<header class="main-header">
   <!-- Logo -->
   <a href="<?php echo e(route('dashboard')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>C</b>Panel</span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
               <ul class="dropdown-menu">
                  <li>
                     <!-- inner menu: contains the actual data -->
                     <ul class="menu">
                        <li>
                           <a href="#">
                           <i class="fa fa-envelope text-red"></i> <span id="msg"></span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!-- <li class="footer"><a href="#">View all</a></li> -->
               </ul>
            </li>
            <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="<?php echo e(asset('admin/dist/img/user2-160x160.jpg')); ?>" class="user-image" alt="User Image">
               <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
               </a>
               <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <img src="<?php echo e(asset('admin/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
                     <p>
                        <?php echo e(Auth::user()->name); ?>

                        <small>Bergabung pada <?php echo e(Auth::user()->created_at->format('d F Y')); ?></small>
                     </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer sidebar-menu">
                     <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                     </div>
                     <div class="pull-right">
                        <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat logout">Keluar</a>
                     </div>
                  </li>
               </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!-- <li>
               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
         </ul>
      </div>
   </nav>
</header><?php /**PATH C:\xampp\htdocs\ibip\resources\views/auths/parts/header.blade.php ENDPATH**/ ?>