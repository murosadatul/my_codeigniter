
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{base_url}" class="brand-link">
    <img src="{base_url}{site_logo}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{site_name}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{base_url}assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
          
          $sidebar_menu = $this->session->userdata('sidebar');
          if(empty(!$sidebar_menu)){//show sidebar_menu
            $no=0;$parent='';
            foreach ($sidebar_menu as $arr){
              $parent=(empty(!$arr['parent'])) ? $arr['parent'] :$arr['code'];
              echo ($arr['parent']!= $parent) ? (($no++ != 0)?'</li>':'').'<li class="nav-item has-treeview '.(($arr['code']==$active_treeview)?'active menu-open':'').' ">' : '';
              echo (empty(!$arr['parent'])) ? '<ul class="nav nav-treeview"><li class="nav-item"><a href="{base_url}'.$arr['url'].'" class="nav-link '.(($arr['code']==$active_page && $active_page!='')?'active':'').' "><i class="nav-icon '.$arr['icon'].'"></i><p>'.$arr['module_name'].'</p></a></li></ul>' :'<a href="{base_url}'.(($arr['flag_menu']==0)? $arr['url']:'javascript:void(0);').'" class="nav-link '.(($arr['code']==$active_treeview OR ($arr['code']==$active_page && $arr['flag_menu']!=0 ) ) ?'active':'').'"> <i class="nav-icon '.$arr['icon'].'"></i> <p>'.$arr['module_name'].(($arr['flag_menu']!=0)?'<i class="right fas fa-caret-left"></i>':'').'</p></a>';
            }
          }
        ?>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>