<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="/img/logo/logo.png" rel="icon">
  <title>Mobilku</title>
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Mobilku</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      @if(auth()->user()->level=="user")
      <li class="nav-item">
        <a class="nav-link" href="#"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Kendaraan yang di Sewa</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Kendaraan</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jenis Kendaraan</h6>
            <a class="collapse-item" href="{{route('mobil-pribadi.index')}}">Mobil Pribadi</a>
            <a class="collapse-item" href="{{route('mobil-umum.index')}}">Minibus</a>
          </div>
        </div>
      </li>

      @if (auth()->user()->level=="admin")
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Sewa Kendaraan</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mobil Yang DiSewa</h6>
            <a class="collapse-item" href="simple-tables.html">Mobil Pribadi</a>
            <a class="collapse-item" href="datatables.html">Minibus</a>
          </div>
        </div>
      </li>
      @endif

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Diri
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Data Pribadi</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Pribadi</h6>
            <a class="collapse-item" href="login.html">Informasi Data Diri</a>
            <a class="collapse-item" href="register.html">Edit Kelengkapan Data</a>
            <a class="collapse-item" href="404.html">Upload KTP</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-tasks fa-fw"></i>
          <span>Riwayat Penyewa</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version">Copyright &copy Reynaldi</div>
      <div class="version" id="version-ruangadmin">Copyright &copy Reynaldi Dimasqi</div>

    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow text-center">
              <h5 class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                    @if(auth()->user()->level=="admin")
                    <span class="ml-2 d-none d-lg-inline text-white small"><strong> Administrator </strong></span>
                    @endif
              </h5>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <div class="container-fluid" id="container-wrapper">
            @yield('content')
        </div>
           
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="{{ route('logout') }}" class="btn btn-primary"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                  </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
     
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/js/ruang-admin.min.js"></script>
  <script src="/vendor/chart.js/Chart.min.js"></script>
  <script src="/js/demo/chart-area-demo.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 
  <script type="text/javascript">
    $(document).ready(function(){
      $('#addform').on('submit',function(e){
        e.preventDefault();

        $.ajax({
          type:"POST",
          url: "/addKendaraan-Pribadi",
          data: $('addform').serailize(),
          success: function(response){
            console.log(response)
              $('#studentaddModal').modal('hide')
            alert("Data Disimpan");
          },
          error:function(error){
            console.log(error)
          alert("Data Gagal Disimpan");
          }
        });
      });
    });

    $('#hapusPribadiModal').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)

      var cat_id = button.data('catid')
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
    })

    $('#editModal').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)

      var nama = button.data('namke')
      var harga = button.data('harke')
      var stok = button.data('stokke')
      var kursi = button.data('kurke')
      var id = button.data('catid')


      var modal = $(this)

      modal.find('.modal-body #nama').val(nama);
      modal.find('.modal-body #harga').val(harga);
      modal.find('.modal-body #stok').val(stok);
      modal.find('.modal-body #kursi').val(kursi);
      modal.find('.modal-body #ken_id').val(id);



    });
  </script>
</body>

</html>