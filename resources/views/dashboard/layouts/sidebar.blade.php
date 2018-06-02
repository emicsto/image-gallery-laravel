<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="/admin" class="simple-text logo-normal">
            Dashboard
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Route::is('images.get') ? 'active' : '' }} ">
                <a class="nav-link" href="/admin">
                    <i class="material-icons">collections</i>
                    <p>Images</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('users.get') ? 'active' : '' }} ">
                <a class="nav-link " href="/admin/users">
                    <i class="material-icons">supervisor_account</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('tags.get') ? 'active' : '' }}">
                <a class="nav-link " href="/admin/tags">
                    <i class="material-icons">bookmark</i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item {{ Route::is('roles.get') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/roles">
                    <i class="material-icons">library_books</i>
                    <p>Roles</p>
                </a>
            </li>
            <li class="nav-item active-pro">
                <a class="nav-link" href="/">
                    <i class="material-icons">home</i>
                    <p>Back to home page</p>
                </a>
            </li>
        </ul>
    </div>
</div>
