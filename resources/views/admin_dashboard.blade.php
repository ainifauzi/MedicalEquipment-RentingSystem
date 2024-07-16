<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head') 
  <script>
    // $(function() {
    //   $.toast({
    //     displayTime: 6000,
    //     message: 'Anda mempunyai permohonan baru. <a href="https://www.google.com/" style="text-decoration: underline;">Lihat</a>',
    //     class : 'yellow',
    //     className: {
    //       toast: 'ui message'
    //     }
    //   });
    // });
  </script>
</head>
<body>
  @include('section.staff_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/admin_dashboard"></a>
      <a class="item active" href="/admin_dashboard">
        Laman Utama
      </a>
      <a class="item" href="/admin_staff_dashboard">
        Petugas
      </a>
      <a class="item" href="/admin_customer_dashboard">
        Pelanggan
      </a>
      <a class="item" href="/admin_equipment_dashboard">
        Peralatan
      </a>
      <a class="item" href="/admin_application_dashboard">
        Permohonan Sewaan
      </a>
    </div>
    <div class="pusher border-none sidenav-content bg-primary-grey">
      <div class=" border-bottom content-header">
        <div class="content-small-header border-right"></div>
        <div class="content-large-header">
          <h2>LAMAN UTAMA</h2>
        </div>
      </div>
      <div class="p-2em">
        <div class="grid-4-equal">
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Petugas</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='staff_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Pelangggan</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='customer_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Permohonan</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='application_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Peralatan Perubatan</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='equipment_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ui modal profile">
    <div class="header bg-primary-grey">Maklumat Akaun</div>
    <div class="content bg-primary-grey">
      <form class="ui form info">
        <div class="two fields">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan">
          </div>
          <div class="field">
            <label>Nama Penuh</label>
            <input type="text" placeholder="sila isi nama penuh">
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>E-mel</label>
            <input type="text" placeholder="sila isi alamat e-mel">
          </div>
          <div class="field">
            <label>Nombor Telefon</label>
            <input type="text" placeholder="sila isi nombor telefon">
          </div>
        </div>
        <div class="field">
          <label>Peranan</label>
          <div class="ui selection dropdown">
            <input type="hidden" name="gender">
            <i class="dropdown icon"></i>
            <div class="default text">sila pilih peranan</div>
            <div class="menu">
              <div class="item" data-value="1">Pentadbir</div>
              <div class="item" data-value="0">Kakitangan</div>
            </div>
          </div>
        </div>
        <div class="field">
          <label>Kata Laluan</label>
          <input type="password" placeholder="sila isi kata laluan">
        </div>
        <div class="ui info message">
          <div class="header">Garis Panduan</div>
          <ul class="list">
            <li>Perlu mengandungi lebih daripada 8 karakter.</li>
            <li>Perlu mengandungi gabungan huruf, nombor & simbol.</li>
          </ul>
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
  <div class="ui tiny modal logout">
    <div class="content">
      Adakah anda pasti untuk <i>log keluar?</i>
    </div>
    <div class="actions">
      <button class="ui right labeled icon deny red button">
        <i class="close icon"></i>
        Batal
      </button>
      <button class="ui right labeled icon green button" onclick="window.location.href='landing_page.html'">
        <i class="checkmark icon"></i>
        Log Keluar
      </button>
    </div>
  </div>
  @include('section.staff_modal')
  @include('section.staff_modal_script')
  <script>
    function logout() {
      $('.ui.tiny.modal.logout')
        .modal('show')
      ;
    }
    function openProfile() {
      $('.ui.modal.profile')
        .modal('show')
      ;
    }
  </script>
</body>
</html>