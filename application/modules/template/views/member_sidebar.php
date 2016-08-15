<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

            <div class="pull-left info">
                <b><?php echo $this->session->userdata('nama') ?></b>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
             <li <?php if ( $this->uri->uri_string() == 'member') { echo "class='active'";} else { echo "";} ?>>
                <a href="<?php echo site_url('member') ?>">
                    <i class="fa fa-user"></i><span>Profil</span> 
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">