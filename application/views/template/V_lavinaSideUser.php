 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('C_lavinaUser') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-bullhorn"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Pengaduan <sup>Masyarakat</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?= base_url('C_lavinaUser') ?>">
             <i class="fas fa-home"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->



     <hr class="sidebar-divider">


     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('C_lavinaUser/mengadu') ?>">
         <i class="fas fa-bullhorn"></i>
             <span>Pengaduan</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('C_lavinaUser/riwayat') ?>">
             <i class="fas fa-table"></i>
             <span>Riwayat</span></a>
     </li>


     <hr class="sidebar-divider">



     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message -->


 </ul>
 <!-- End of Sidebar -->