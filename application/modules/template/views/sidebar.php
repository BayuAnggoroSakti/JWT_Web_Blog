<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
       <
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li <?php if ( $this->uri->uri_string() == 'admin' || $this->uri->uri_string() == 'admin/tambah'  ) { echo "class='active'";} else { echo "";} ?>>
                <a href="<?php echo site_url('admin') ?>">
                    <i class="fa fa-book"></i><span>Post</span> 
                </a>
            </li>
             <li <?php if ( $this->uri->uri_string() == 'admin/kategori' || $this->uri->uri_string() == 'admin/kategori/tambah'  ) { echo "class='active'";} else { echo "";} ?>>
                <a href="<?php echo site_url('admin/kategori') ?>">
                    <i class="fa fa-users"></i><span>Kategori</span> 
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">