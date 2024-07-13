<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('#myTable').DataTable({
        "paging": false,
        "ordering": true,
        "searching": true,
        "info": false,
        "language": {
          "search": ""
        }
      });
    });
  </script>
</head>
<body>
  @include('section.client_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/client_admin_dashboard"></a>
      <a class="item" href="/client_admin_dashboard">
        Laman Utama
      </a>
      <a class="item" href="/client_application_dashboard">
        Permohonan Sewaan
      </a>
      <a class="item active" href="/client_history_dashboard">
        Sejarah Sewaan
      </a>
    </div>
    <div class="pusher border-none sidenav-content bg-primary-grey">
      <div class=" border-bottom content-header">
        <div class="content-small-header border-right"></div>
        <div class="content-large-header">
          <h2>SEJARAH SEWAAN</h2>
        </div>
      </div>
      <div class="p-2em">
        <div class="ui segment">
          <table id="myTable" class="display">
            <thead>
              <tr>
                <th>Nombor KP</th>
                <th>Nama Penuh</th>
                <th>Peralatan</th>
                <th>Tarikh Pemulangan</th>
                <th>Keadaan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>990507015687</td>
                <td>KHAIRIL AZUAN BIN RAMLI</td>
                <td>KERUSI RODA</td>
                <td>10 JUN 2024</td>
                <td><a class="ui green label">Baik</a></td>
              </tr>
              <tr>
                <td>990507015687</td>
                <td>KHAIRIL AZUAN BIN RAMLI</td>
                <td>KERUSI RODA</td>
                <td>10 JUN 2024</td>
                <td><a class="ui red label">Rosak</a></td>
              </tr>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
  @include('section.client_modal')
  @include('section.client_modal_script')
  <script>
  </script>
</body>
</html>