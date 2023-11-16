<div class="sidebar">
  <div class="side-header">
    <h3>D<span>asboard</span></h3>
  </div>

  <div class="side-content">
    <div class="profile">
      <div class="profile-img bg-img" style="background-image: url(../../images/img-profile/1.jpeg)"></div>
      <h4>David Green</h4>
      <small>Art Director</small>
    </div>

    <div class="side-menu">
      <ul>
        <li>
          <a href="index.php?page=dashboard" data-page="dashboard" <?php echo (isset($_GET['page']) && $_GET['page'] == 'dashboard' ? 'class="active"' : ''); ?>>
            <span class="las la-home"></span>
            <small>Dashboard</small>
          </a>
        </li>
        <li>
          <a href="index.php?page=profile" data-page="profile" <?php echo (isset($_GET['page']) && $_GET['page'] == 'profile' ? 'class="active"' : ''); ?>>
            <span class="las la-user-alt"></span>
            <small>Profile</small>
          </a>
        </li>
        <li>
          <a href="index.php?page=mailbox" data-page="mailbox" <?php echo (isset($_GET['page']) && $_GET['page'] == 'mailbox' ? 'class="active"' : ''); ?>>
            <span class="las la-envelope"></span>
            <small>Mailbox</small>
          </a>
        </li>
        <li>
          <a href="index.php?page=projects" data-page="projects" <?php echo (isset($_GET['page']) && $_GET['page'] == 'projects' ? 'class="active"' : ''); ?>>
            <span class="las la-clipboard-list"></span>
            <small>Projects</small>
          </a>
        </li>
        <li>
          <a href="index.php?page=orders" data-page="orders" <?php echo (isset($_GET['page']) && $_GET['page'] == 'orders' ? 'class="active"' : ''); ?>>
            <span class="las la-shopping-cart"></span>
            <small>Orders</small>
          </a>
        </li>
        <li>
          <a href="index.php?page=task" data-page="task" <?php echo (isset($_GET['page']) && $_GET['page'] == 'task' ? 'class="active"' : ''); ?>>
            <span class="las la-tasks"></span>
            <small>Tasks</small>
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>

