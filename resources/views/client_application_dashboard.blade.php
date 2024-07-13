<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('.selection.dropdown.equipment')
        .dropdown()
      ;
      $('.selection.dropdown.application.status')
        .dropdown()
      ;
      $('.selection.dropdown.payment.status')
        .dropdown()
      ;
      $('.selection.dropdown.condition')
        .dropdown()
      ;
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
      <a class="item active" href="/client_application_dashboard">
        Permohonan Sewaan
      </a>
      <a class="item" href="/client_history_dashboard">
        Sejarah Sewaan
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
        <div class="ui top attached segment">
          <button class="ui right labeled violet icon button" onclick="insertPrompt()">
            <i class="plus icon"></i>
            Permohonan Baru
          </button>
        </div>
        <div class="ui bottom attached segment">
          <table id="myTable" class="display">
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
                  <button class="ui right labeled icon olive button" onclick="insertPrompt()">
                    <i class="info icon"></i>
                    Butiran
                  </button>
                  <button class="ui right labeled icon orange button" onclick="deletePrompt()">
                    <i class="eraser icon"></i>
                    Hapus
                  </button>
                </td>
              </tr>
              <tr>
                <td>KHAIRIL AZUAN BIN RAMLI</td>
                <td>KERUSI RODA</td>
                <td><a class="ui green label">Berjaya</a></td>
                <td><a class="ui red label">Belum Dibayar</a></td>
                <td>
                  <button class="ui right labeled icon olive button" onclick="insertPrompt()">
                    <i class="info icon"></i>
                    Butiran
                  </button>
                  <button class="ui right labeled icon orange button" onclick="deletePrompt()">
                    <i class="eraser icon"></i>
                    Hapus
                  </button>
                  <button class="ui right labeled icon teal button" onclick="paymentPrompt()">
                    <i class="credit card outline icon"></i>
                    Bayar
                  </button>
                </td>
              </tr>
              <tr>
                <td>KHAIRIL AZUAN BIN RAMLI</td>
                <td>KERUSI RODA</td>
                <td><a class="ui green label">Berjaya</a></td>
                <td><a class="ui green label">Telah Dibayar</a></td>
                <td>
                  <button class="ui right labeled icon olive button" onclick="insertPrompt()">
                    <i class="info icon"></i>
                    Butiran
                  </button>
                  <button class="ui right labeled icon orange button" onclick="deletePrompt()">
                    <i class="eraser icon"></i>
                    Hapus
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="ui tiny modal delete">
    <div class="content">
      Adakah anda pasti untuk <b>hapuskan</b> data berikut?
    </div>
    <div class="actions">
      <button class="ui right labeled icon deny red button">
        <i class="close icon"></i>
        Batal
      </button>
      <button class="ui right labeled icon green button">
        <i class="checkmark icon"></i>
        Hapus
      </button>
    </div>
  </div>
  <div class="ui modal insert">
    <div class="header bg-primary-grey">Maklumat Permohonan</div>
    <div class="content bg-primary-grey">
      <form class="ui form info">
        <div class="two fields">
          <div class="field">
            <label>Peralatan</label>
            <div class="ui selection dropdown equipment">
              <input type="hidden" name="equipment">
              <i class="dropdown icon"></i>
              <div class="default text">sila pilih peralatan</div>
              <div class="menu">
                <div class="item" data-value="1">Ahli</div>
                <div class="item" data-value="0">Bukan Ahli</div>
              </div>
            </div>
          </div>
          <div class="field">
            <label>Status Permohonan</label>
            <input type="text" disabled>
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Kuantiti</label>
            <input type="number" placeholder="sila isi kuantiti peralatan">
          </div>
          <div class="field">
            <label>Tarikh Mula Sewaan</label>
            <input type="date">
          </div>
          <div class="field">
            <label>Tarikh Tamat Sewaan</label>
            <input type="date">
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Harga Sewaan</label>
            <input type="text" disabled>
          </div>
          <div class="field">
            <label>Status Pembayaran</label>
            <div class="ui selection dropdown payment status">
              <input type="hidden" name="payment status">
              <i class="dropdown icon"></i>
              <div class="default text">sila pilih status pembayaran</div>
              <div class="menu">
                <div class="item" data-value="1">Dalam Proses</div>
                <div class="item" data-value="0">Gagal</div>
                <div class="item" data-value="0">Berjaya</div>
              </div>
            </div>
          </div>
          <div class="field">
            <label>Surat Sakit</label>
            <input type="file">
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
  <div class="ui tiny modal payment">
    <div class="header bg-primary-grey">Pembayaran</div>
    <div class="content bg-primary-grey">
      <form class="ui form info">
        <div class="field">
          <label>Peralatan</label>
          <input type="text" disabled value="KERUSI RODA">
        </div>
        <div class="field">
          <label>Jumlah</label>
          <input type="number" placeholder="sila isi jumlah bayaran">
        </div>
        <div class="field">
          <label>Resit</label>
          <input type="file">
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
  @include('section.client_modal')
  @include('section.client_modal_script')
  <script>
    function deletePrompt() {
      $('.ui.tiny.modal.delete')
        .modal('show')
      ;
    }
    function insertPrompt() {
      $('.ui.modal.insert')
        .modal('show')
      ;
    }
    function paymentPrompt() {
      $('.ui.tiny.modal.payment')
        .modal('show')
      ;
    }
  </script>
</body>
</html>