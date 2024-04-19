<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Sidebar Menu</title>
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Materialize Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Dashboard</a>
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a href="#" id="sidebar-toggle" class="right"><i class="material-icons">arrow_forward</i></a>
    </div>
  </nav>

  <!-- Sidebar -->
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="background.jpg">
      </div>
      <a href="#user"><img class="circle" src="user.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">john@example.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li><a href="#!"><i class="material-icons">insert_chart</i>Charts</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Settings</a></li>
    <li><a href="#!"><i class="material-icons">settings</i>General Settings</a></li>
    <li><a href="#!"><i class="material-icons">security</i>Security</a></li>
  </ul>

  <!-- Content -->
  <div class="container">
    <h1>Main Content</h1>
    <p>This is the main content of the dashboard.</p>
  </div>

  <!-- Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- Custom JS -->
  <script>

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.sidenav');
  var instances = M.Sidenav.init(elems);

  var sidebarToggle = document.getElementById('sidebar-toggle');
  sidebarToggle.addEventListener('click', function() {
    var sidenavInstance = M.Sidenav.getInstance(elems[0]);
    sidenavInstance.isOpen ? sidenavInstance.close() : sidenavInstance.open();
    sidebarToggle.innerHTML = sidenavInstance.isOpen ? '<i class="material-icons">arrow_forward</i>' : '<i class="material-icons">arrow_back</i>';
  });
});

  </script>
</body>
</html>
