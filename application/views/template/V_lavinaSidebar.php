 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('C_lavinaAdmin') ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-bullhorn"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Pengaduan <sup>Masyarakat</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="<?= base_url('C_lavinaAdmin') ?>">
             <i class="fas fa-home"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->



     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Master Data
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('C_lavinaAdmin/kategori') ?>">
             <i class="fas fa-list-ul"></i>
             <span>Kategori</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('C_lavinaAdmin/Masyarakat') ?>">
             <i class="fas fa-users"></i>
             <span>Masyarakat</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('C_lavinaAdmin/petugas') ?>">
             <i class="fas fa-user-shield"></i>
             <span>Petugas</span></a>
     </li>

     <hr class="sidebar-divider">

     <div class="sidebar-heading">
         Panduan
     </div>

     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('C_lavinaAdmin/pengadu') ?>">
             <i class="fas fa-table"></i>
             <span>Pangaduan</span></a>
     </li>

     <?php if ($user['level'] == 'admin') { ?>

         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-file-pdf"></i>
                 <span>Laporan</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Print Laporan :</h6>
                     <a class="collapse-item" href="<?= base_url('C_LavinaAdmin/laporan_pdf') ?>">Laporan Pengaduan</a>
                     <a class="collapse-item" href="<?= base_url('C_lavinaAdmin/laporan_petugas') ?>">Data Petugas</a>
                     <a class="collapse-item" href="<?= base_url('C_lavinaAdmin/laporan_masyarakat') ?>">Data Masyarakat</a>
                 </div>
             </div>
         </li>
     <?php } ?>



     <hr class="sidebar-divider d-none d-md-block">


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message -->


 </ul>
 <!-- End of Sidebar -->