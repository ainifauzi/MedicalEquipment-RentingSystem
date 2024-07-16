<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('.selection.dropdown.application.status')
        .dropdown()
      ;
      $('.selection.dropdown.condition')
        .dropdown()
      ;
      $('#datatable').DataTable({
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
  @include('section.staff_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/admin_dashboard"></a>
      <a class="item" href="/admin_dashboard">
        Laman Utama
      </a>
      <a class="item" href="admin_staff_dashboard.html">
        Petugas
      </a>
      <a class="item" href="admin_customer_dashboard.html">
        Pelanggan
      </a>
      <a class="item" href="admin_equipment_dashboard.html">
        Peralatan
      </a>
      <a class="item active" href="admin_application_dashboard.html">
        Permohonan Sewaan
      </a>
    </div>
    <div class="pusher border-none sidenav-content bg-primary-grey">
      <div class=" border-bottom content-header">
        <div class="content-small-header border-right"></div>
        <div class="content-large-header">
          <h2>PERMOHONAN SEWAAN</h2>
        </div>
      </div>
      <div class="p-2em">
        <div class="ui segment">
          <table id="datatable" class="display">
            <thead>
              <tr>
                <th>Nama Penuh</th>
                <th>Peralatan</th>
                <th>Status Permohonan</th>
                <th>Status Pembayaran</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>KHAIRIL AZUAN BIN RAMLI</td>
                <td>KERUSI RODA</td>
                <td><a class="ui red label">Gagal</a></td>
                <td><a class="ui yellow label">Dalam Proses</a></td>
                <td>
                  <button class="ui right labeled icon olive button" onclick="displayPrompt()">
                    <i class="info icon"></i>
                    Butiran
                  </button>
                  <button class="ui right labeled icon teal button" onclick="updatePrompt()">
                    <i class="pen icon"></i>
                    Kemaskini
                  </button>
                </td>
              </tr>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
  <div class="ui modal display">
    <div class="header bg-primary-grey">Maklumat Permohonan</div>
    <div class="content bg-primary-grey">
      <form class="ui form info">
        <div class="field">
          <label>Peralatan</label>
          <input type="number" disabled>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Kuantiti</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Tarikh Mula Sewaan</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Tarikh Tamat Sewaan</label>
            <input type="text" disabled>
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Harga Sewaan</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Status Pembayaran</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Status Permohonan</label>
            <input type="text" disabled>
          </div>
        </div>
      </form>
    </div>
    <div class="actions bg-primary-grey">
      <button class="ui right labeled icon deny button">
        <i class="close icon"></i>
        Tutup
      </button>
    </div>
  </div>
  <div class="ui modal update">
    <div class="header bg-primary-grey">Kemaskini Permohonan</div>
    <div class="content bg-primary-grey">
      <form class="ui form info">
        <div class="field">
          <label>Peralatan</label>
          <input type="number" disabled>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Kuantiti</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Tarikh Mula Sewaan</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Tarikh Tamat Sewaan</label>
            <input type="text" disabled>
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Harga Sewaan</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Status Pembayaran</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Status Permohonan</label>
            <div class="ui selection dropdown application status">
              <input type="hidden" name="application status">
              <i class="dropdown icon"></i>
              <div class="default text">sila pilih status permohonan</div>
              <div class="menu">
                <div class="item" data-value="1">Dalam Proses</div>
                <div class="item" data-value="0">Gagal</div>
                <div class="item" data-value="0">Lulus</div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="actions bg-primary-grey">
      <button class="ui right labeled icon deny red button">
        <i class="close icon"></i>
        Batal
      </button>
      <button class="ui right labeled icon green button">
        <i class="checkmark icon"></i>
        Simpan
      </button>
    </div>
  </div>
  @include('section.staff_modal')
  @include('section.staff_modal_script')
  <script>
    function displayPrompt() {
      $('.ui.modal.display')
        .modal('show')
      ;
    }
    function updatePrompt() {
      $('.ui.modal.update')
        .modal('show')
      ;
    }
  </script>
</body>
</html>