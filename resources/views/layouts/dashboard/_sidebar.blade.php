     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link pb-3 mb-3 ">
         <img src="{{ asset('dashboard_files') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <div class="sidebar">


         <!-- Sidebar Menu -->
         <nav class="mt-3">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">

                 <li class="nav-item">
                     <a href="{{ route('dashboard.home') }}" class="nav-link active">
                         <i class="nav-icon fas fa-th"></i>
                         <p>Home</p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
