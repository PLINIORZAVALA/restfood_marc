<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->    
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="./" class="sidebar-brand">
                <i class="fa fa-superpowers"></i>
                <span class="sidebar-nav-mini-hide"><strong><?php echo $template['nom_proyecto']?></strong>
            </span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#">
                        <img src="../<?php echo $img_user;?>" alt="avatar">
                     </a>
                </div>
                <div class="sidebar-user-name"><?php echo $nom_user;?></div>
                <div class="sidebar-user-links">
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                    <a href="../lib/PHP_cerrar.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesion"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="./" class="">                    
                        <i class="fa fa-home sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Inicio</span>
                    </a>
                </li>
                <li class="sidebar-header">
                     <span class="sidebar-header-title">MENU</span>
                </li>
                <li>
                    <a href="usuarios.php" class="">                    
                        <i class="fa fa-user sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Usuario</span>
                    </a>
                </li>  
                <li>
                    <a href="#" class="">                    
                        <i class="fa fa-users sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Clientes</span>
                    </a>
                </li> 
                <li>
                    <a href="#" class="">                    
                        <i class="fa fa-book sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Libros</span>
                    </a>
                </li>           
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
                        <!-- END Sidebar Content -->
     </div>    <!-- END Wrapper for scrolling functionality -->
</div>