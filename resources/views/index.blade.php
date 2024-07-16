<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('.tabular.menu .item').tab();
      $('.selection.dropdown.member')
        .dropdown()
      ;
    });
  </script>
</head>
<body>
  <div class="topnav border-top border-bottom">
    <a class="p-15px-25px" href="#">Peralatan Perubatan</a>
    <a class="p-15px-25px" href="javascript:void(0);" onclick="register()">Daftar Masuk</a>
    <a class="p-15px-25px" href="#">Tentang Kami</a>
  </div> 
  <div class="grid-3-equal">
    <div class="grid-landing-page-item p-5em">
      <div class="ui piled segment">
        <h4 class="ui header">A header</h4>
        <p>Te eum doming eirmod, nominati pertinacia argumentum ad his. Ex eam alia facete scriptorem, est autem aliquip detraxit at. Usu ocurreret referrentur at, cu epicurei appellantur vix. Cum ea laoreet recteque electram, eos choro alterum definiebas in. Vim dolorum definiebas an. Mei ex natum rebum iisque.</p>
         <p>Audiam quaerendum eu sea, pro omittam definiebas ex. Te est latine definitiones. Quot wisi nulla ex duo. Vis sint solet expetenda ne, his te phaedrum referrentur consectetuer. Id vix fabulas oporteat, ei quo vide phaedrum, vim vivendum maiestatis in.</p>
         <p>Eu quo homero blandit intellegebat. Incorrupte consequuntur mei id. Mei ut facer dolores adolescens, no illum aperiri quo, usu odio brute at. Qui te porro electram, ea dico facete utroque quo. Populo quodsi te eam, wisi everti eos ex, eum elitr altera utamur at. Quodsi convenire mnesarchum eu per, quas minimum postulant per id.</p>
      </div>
    </div>
    <div class="grid-landing-page-item p-5em-2em">
      <div class="ui tabular menu m-0">
        <div class="item w-50pct cursor-pointer" data-tab="staff-login">Petugas</div>
        <div class="item w-50pct cursor-pointer" data-tab="client-login">Pelanggan</div>
      </div>
      <div class="ui tab p-40px border-bottom border-left border-right border-bottom-radius bg-primary-grey" data-tab="staff-login">
        <form class="ui form info" id="staffSigninId" method="post" enctype="multipart/form-data">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan" name="staffIcNumber" required>
          </div>
          <div class="field">
            <label>Kata Laluan</label>
            <input type="password" placeholder="sila isi kata laluan" name="staffPassword" required>
          </div>
          <div class="ui info message">
            <div class="header">Garis Panduan</div>
            <ul class="list">
              <li>Perlu mengandungi lebih daripada 8 karakter.</li>
              <li>Perlu mengandungi gabungan huruf, nombor & simbol.</li>
            </ul>
          </div>
          <!-- <button class="ui right labeled icon blue button" onclick="window.location.href='client_admin_dashboard.html'"> -->
          <button type="submit" class="ui right labeled icon blue button">
            <i class="right arrow icon"></i>
            Log Masuk
          </button>
        </form>
      </div>
      <div class="ui tab p-40px border-bottom border-left border-right border-bottom-radius bg-primary-grey" data-tab="client-login">
        <form class="ui form info" id="clientSigninId" method="post" enctype="multipart/form-data">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan" name="clientIcNumber" required>
          </div>
          <div class="field">
            <label>Kata Laluan</label>
            <input type="password" placeholder="sila isi kata laluan" name="clientPassword" required>
          </div>
          <div class="ui info message">
            <div class="header">Garis Panduan</div>
            <ul class="list">
              <li>Perlu mengandungi lebih daripada 8 karakter.</li>
              <li>Perlu mengandungi gabungan huruf, nombor & simbol.</li>
            </ul>
          </div>
          <!-- <button class="ui right labeled icon blue button" onclick="window.location.href='client_admin_dashboard.html'"> -->
          <button type="submit" class="ui right labeled icon blue button">
            <i class="right arrow icon"></i>
            Log Masuk
          </button>
        </form>
      </div>
    </div>
  </div>
  <form class="ui modal register" id="insertFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Daftar Akaun</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <div class="two fields">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan" name="clientIcNumber" required>
          </div>
          <div class="field">
            <label>Nama Penuh</label>
            <input type="text" placeholder="sila isi nama penuh" name="clientName" required>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>E-mel</label>
            <input type="email" placeholder="sila isi alamat e-mel" name="clientEmail" required>
          </div>
          <div class="field">
            <label>Nombor Telefon</label>
            <input type="text" placeholder="sila isi nombor telefon" name="clientPhoneNo" required>
          </div>
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea class="resize-none" rows="3" name="clientAddress" required></textarea>
        </div>
        <div class="field">
          <label>Pekerjaan</label>
          <input type="text" placeholder="sila isi pekerjaan" name="clientJob" required>
        </div>
        <div class="two fields">
          <div class="field">
            <label>Jenis Kanser</label>
            <input type="text" placeholder="sila isi jenis kanser" name="clientCancerType" required>
          </div>
          <div class="field">
            <label>Keahlian</label>
            <div class="ui selection dropdown member">
              <input type="hidden"  name="clientMembership" required>
              <i class="dropdown icon"></i>
              <div class="default text">sila pilih jenis keahlian</div>
              <div class="menu">
                <div class="item" data-value="Ahli">Ahli</div>
                <div class="item" data-value="Bukan Ahli">Bukan Ahli</div>
              </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label>Kata Laluan</label>
          <input type="password" placeholder="sila isi kata laluan" name="clientPassword" required>
        </div>
        <div class="ui info message">
          <div class="header">Garis Panduan</div>
          <ul class="list">
            <li>Perlu mengandungi lebih daripada 8 karakter.</li>
            <li>Perlu mengandungi gabungan huruf, nombor & simbol.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="actions bg-primary-grey">
      <button type="button" class="ui right labeled icon deny red button">
        <i class="close icon"></i>
        Batal
      </button>
      <button type="submit" class="ui right labeled icon green button">
        <i class="checkmark icon"></i>
        Daftar
      </button>
    </div>
  </form>
  <script>
    function register() {
      $('.ui.modal.register')
        .modal('show')
      ;
    }

    $('#insertFormId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/client',
        method: 'POST',
        data: $('#insertFormId').serialize(),
        success: function(res) {
          if (res) {
            $('#insertFormId').trigger('reset');
          }
        },
        error: function(err) {
          console.log('error: ' + err);
        }
      });
    });

    $('#clientSigninId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/client/signin',
        method: 'POST',
        data: $('#clientSigninId').serialize(),
        success: function(res) {
          if (res.data.responseStatus) {
            sessionStorage.setItem('user_id', res.data.responseId);
            window.location.href = '/client_admin_dashboard';
          } else {
            alert(res.data.responseMessage)
          }
        },
        error: function(err) {
          console.log('error: ' + err);
        }
      });
    });

    $('#staffSigninId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/staff/signin',
        method: 'POST',
        data: $('#staffSigninId').serialize(),
        success: function(res) {
          if (res.data.responseStatus) {
            sessionStorage.setItem('user_id', res.data.responseId);
            if (res.data.responseRole === 'Petugas') {
              window.location.href = '/staff_application_dashboard';
            } else if (res.data.responseRole === 'Pentadbir') {
              window.location.href = '/admin_dashboard';
            }
          } else {
            alert(res.data.responseMessage)
          }
        },
        error: function(err) {
          console.log('error: ' + err);
        }
      });
    });
  </script>
</body>
</html>