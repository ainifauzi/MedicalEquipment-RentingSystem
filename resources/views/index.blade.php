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
<body class="index">
  <div class="topnav border-top border-bottom">
    <a style="pointer-events: none; color: black;" class="p-15px-25px" href="/"> SISTEM SEWAAN PERALATAN PERUBATAN</a>
    <a class="p-15px-25px" href="javascript:void(0);" onclick="login()"><i style="margin-right: 5px" class="fa fa-sign-in"></i> Log Masuk</a>
    <a class="p-15px-25px" href="javascript:void(0);" onclick="register()"><i style="margin-right: 5px" class="fa fa-user-plus"></i> Daftar Masuk</a>
    <a class="p-15px-25px" href="javascript:void(0);" onclick="aboutUs()"><i style="margin-right: 5px" class='fa fa-book'></i> Tentang Kami</a>
  </div>

  <div class="slideshow-container">
    <div class="container slide-class fade">
      <img class="slide-image-class" src="assets/img/kanser.jpg">
      <div class="centered">
        <h1>PERTUBUHAN PEJUANG KANSER MELAKA (PPKM)</h1>
        <h2 style="font-family: 'Playwrite DK Loopet', cursive;">"Unite with the Power of Love"</h2>
      </div>
    </div>
    <div class="container slide-class fade">
      <img class="slide-image-class" src="assets/img/ajkppkm.jpg">
      <div class="centered">
        <h1>PERTUBUHAN PEJUANG KANSER MELAKA (PPKM)</h1>
        <h2 style="font-family: 'Playwrite DK Loopet', cursive;">"Unite with the Power of Love"</h2>
      </div>
    </div>
    <div class="container slide-class fade">
      <img class="slide-image-class" src="assets/img/merdeka.jpg">
      <div class="centered">
        <h1>PERTUBUHAN PEJUANG KANSER MELAKA (PPKM)</h1>
        <h2 style="font-family: 'Playwrite DK Loopet', cursive;">"Unite with the Power of Love"</h2>
      </div>
    </div>
    <div class="container slide-class fade">
      <img class="slide-image-class" src="assets/img/program.jpg">
      <div class="centered">
        <h1>PERTUBUHAN PEJUANG KANSER MELAKA (PPKM)</h1>
        <h2 style="font-family: 'Playwrite DK Loopet', cursive;">"Unite with the Power of Love"</h2>
      </div>
    </div>
  </div>
  <br>
  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
  <form class="ui modal register" id="registerFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Daftar Akaun</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <div class="ui message" id="registerMessageId"></div>
        <div class="two fields">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan - e.g: 000000-00-0000" name="clientIcNumber">
          </div>
          <div class="field">
            <label>Nama Penuh</label>
            <input type="text" placeholder="sila isi nama penuh" name="clientName">
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>E-mel</label>
            <input type="email" placeholder="sila isi alamat e-mel" name="clientEmail">
          </div>
          <div class="field">
            <label>Nombor Telefon</label>
            <input type="text" placeholder="sila isi nombor telefon - e.g: 000-00000000" name="clientPhoneNo">
          </div>
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea class="resize-none" rows="2" name="clientAddress"></textarea>
        </div>
        <div class="field">
          <label>Pekerjaan</label>
          <input type="text" placeholder="sila isi pekerjaan" name="clientJob">
        </div>
        <div class="two fields">
          <div class="field">
            <label>Jenis Kanser</label>
            <input type="text" placeholder="sila isi jenis kanser" name="clientCancerType">
          </div>
          <div class="field">
            <label>Keahlian</label>
            <div class="ui selection dropdown member">
              <input type="hidden" name="clientMembership">
              <i class="dropdown icon"></i>
              <div class="default text">sila pilih jenis keahlian</div>
              <div class="menu">
                <div class="item" data-value="AHLI">AHLI</div>
                <div class="item" data-value="BUKAN AHLI">BUKAN AHLI</div>
              </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label>Kata Laluan</label>
          <input type="password" placeholder="sila isi kata laluan" name="clientPassword">
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
      <button onclick="resetRegisterForm()" type="button" class="ui right labeled icon deny clear red button">
        <i class="close icon"></i>
        Batal
      </button>
      <button onclick="resetRegisterForm()" type="button" class="ui right labeled icon reset yellow button">
        <i class="refresh icon"></i>
        Set Semula
      </button>
      <button type="submit" class="ui right labeled icon green button">
        <i class="checkmark icon"></i>
        Daftar
      </button>
    </div>
  </form>
  <div class="ui modal login">
    <div class="header bg-primary-grey">Daftar Akaun</div>
    <div class="content bg-primary-grey">
      <div class="ui tabular menu m-0">
        <div class="item w-50pct cursor-pointer" data-tab="staff-login">Petugas</div>
        <div class="item w-50pct cursor-pointer" data-tab="client-login">Pelanggan</div>
      </div>
      <div class="ui tab p-40px border-bottom border-left border-right border-bottom-radius bg-primary-grey" data-tab="staff-login">
        <form class="ui form info" id="staffSigninId" method="post" enctype="multipart/form-data">
          <div class="ui red message" id="staffMessageId"></div>
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan" name="staffIcNumber" value="">
          </div>
          <div class="field">
            <label>Kata Laluan</label>
            <input type="password" placeholder="sila isi kata laluan" name="staffPassword" value="">
          </div>
          <div class="ui info message">
            <div class="header">Garis Panduan</div>
            <ul class="list">
              <li>Perlu mengandungi lebih daripada 8 karakter.</li>
              <li>Perlu mengandungi gabungan huruf, nombor & simbol.</li>
            </ul>
          </div>
          <button type="submit" class="ui right labeled icon blue button">
            <i class="right arrow icon"></i>
            Log Masuk
          </button>
        </form>
      </div>
      <div class="ui tab p-40px border-bottom border-left border-right border-bottom-radius bg-primary-grey" data-tab="client-login">
        <form class="ui form info" id="clientSigninId" method="post" enctype="multipart/form-data">
        <div class="ui red message" id="clientMessageId"></div>
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan" name="clientIcNumber" value="">
          </div>
          <div class="field">
            <label>Kata Laluan</label>
            <input type="password" placeholder="sila isi kata laluan" name="clientPassword" value="">
          </div>
          <div class="ui info message">
            <div class="header">Garis Panduan</div>
            <ul class="list">
              <li>Perlu mengandungi lebih daripada 8 karakter.</li>
              <li>Perlu mengandungi gabungan huruf, nombor & simbol.</li>
            </ul>
          </div>
          <button type="submit" class="ui right labeled icon blue button">
            <i class="right arrow icon"></i>
            Log Masuk
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="ui modal about us">
    <div class="header bg-primary-grey">Tentang Kami</div>
    <div class="scrolling content bg-primary-grey" style="padding: 40px !important">
      <ol>
        <b><li>Pengenalan Pertubuhan</li></b>
        <br>
        <div>
          Pertubuhan Pejuang Kanser Melaka (PPKM) bersama barisan ahli jawatankuasa yang dilantik telah menubuhkan dan mendaftarkan Pertubuhan ini dibawah Akta Pertubuhan 1966 pada 19 Ogos 2020 dan beralamat di Melaka. Tujuan penubuhan antaranya adalah untuk memberikan sokongan moral dan bantuan peralatan sokongan kesihatan serta keperluan asas kepada ahli, waris atau penjaga pesakit kanser. Kepimpinan pertubuhan ini adalah terdiri daripada jururawat, doktor, pesakit kanser dan waris yang berkhidmat secara sukarela. 
        </div>
        <br>
        <br>
        <b><li>Latar Belakang Pertubuhan</li></b>
        <br>
        <div>
          Pertubuhan ini telah lama aktif dengan aktiviti ziarah kasih dan penyampaian sumbangan masyarakat kepada ahli dibawah kategori B40 sejak sebelum ini dengan nama Power Of Love. Pada masa ini ahli adalah terdiri daripada pelbagai latar belakang masyarakat dan bangsa iaitu golongan B40, asnaf, ibu tunggal, warga emas mahupun orang kelainan upaya (OKU) yang merupakan penduduk negeri Melaka.
          Keahlian pertubuhan ini telah mencecah hampir 400 orang sehingga Disember 2022 dan yuran keahlian yang dikenakan adalah serendah RM10.00 sahaja setiap tahun.
          Kini, PPKM bergerak di bawah tema Unite With The Power of Love.
        </div>
        <br>
        <br>
        <b><li>Maklumat Pertubuhan</li></b>
        <br>
        <ol style="margin-left: 30px">
          <li>Memberi bantuan dan sokongan dari segi sosial, fizikal dan mental.</li>
          <li>Menganjurkan program motivasi dan kerohanian yang bersesuaian dengan ahli persatuan.</li>
          <li>Memberi sokongan emosi yang bersesuaian kepada ahli yang memerlukan.</li>
          <li>Memberi bantuan peralatan sokongan kesihatan yang bersesuaian dan berkaitan seperti mesin oksigen, katil pesakit, wheelchair, commode chair dan lain-lain peralatan pakai buang yang diperlukan oleh pesakit.</li>
        </ol>
        <br>
        <br>
        <b><li>Kelebihan Menyertai Pertubuhan ini</li></b>
        <br>
        <ol style="margin-left: 30px">
          <li>Ahli boleh mendapatkan peralatan perubatan dengan kadar sewa yang rendah.</li>
          <li>Ahli boleh mengikuti semua program motivasi dan aktiviti yang dianjurkan oleh PPKM pada setiap masa.</li>
          <li>Ahli boleh mendapatkan khidmat nasihat dan kumpulan sokongan sepanjang mendapatkan rawatan serta selepas rawatan.</li>
          <li>Ahli akan mendapat silaturrahim dan ukhwah bersama pejuang-pejuang kanser yang telah melalui pengalaman yang sama.</li>
          <li>Ahli yang terdiri daripada golongan asnaf, b40, ibu tunggal dan warga emas berpeluang untuk mendapatkan sumbangan semasa perayaan.</li>
        </ol>
      </ol>  
    </div>
    <div class="center aligned actions">
      <button onclick="location.href='https://www.youtube.com/channel/UCwap28eCwOWxa_rM8sv_GKw';" style="background-color: #FF0000; color: #fff" type="button" class="ui right labeled icon clear button">
        <i class="youtube icon"></i>
        YouTube
      </button>
      <button onclick="location.href='https://www.facebook.com/groups/pejuangkansermelaka';" style="background-color: #4267B2; color: #fff" type="button" class="ui right labeled icon clear button">
        <i class="facebook icon"></i>
        Facebook
      </button>
    </div>
  </div>
  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("slide-class");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" dot-active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " dot-active";
      setTimeout(showSlides, 4000);
    }

    onUpperCaseForm('registerFormId');

    $('#staffMessageId').hide();
    $('#clientMessageId').hide();
    $('#registerMessageId').hide();

    $('.ui.form.info#staffSigninId').form({
      fields: {
        staffIcNumber : 'empty',
        staffPassword : {
          identifier: 'staffPassword',
          rules: [{
            type: 'regExp[/^[a-zA-Z\\d\\W_]{9,}$/]',
          }]
        },
      }
    });

    $('.ui.form.info#clientSigninId').form({
      fields: {
        clientIcNumber : 'empty',
        clientPassword : {
          identifier: 'clientPassword',
          rules: [{
            type: 'regExp[/^[a-zA-Z\\d\\W_]{9,}$/]',
          }]
        },
      }
    });
    
    $('.ui.modal.register#registerFormId').form({
      fields: {
        clientIcNumber : {
          identifier: 'clientIcNumber',
          rules: [{
            type: 'regExp[/^\\d{6}-\\d{2}-\\d{4}$/]',
          }]
        },
        clientName : 'empty',
        clientEmail : 'empty',
        clientPhoneNo : {
          identifier: 'clientPhoneNo',
          rules: [{
            type: 'regExp[/^\\d{3}-\\d{7,8}$/]',
          }]
        },
        clientAddress : 'empty',
        clientJob : 'empty',
        clientCancerType : 'empty',
        clientMembership : 'empty',
        clientPassword : {
          identifier: 'clientPassword',
          rules: [{
            type: 'regExp[/^[a-zA-Z\\d\\W_]{9,}$/]',
          }]
        },
      }
    });

    function register() {
      $('.ui.modal.register')
        .modal('setting', 'closable', false)
        .modal('show')
      ;
    }

    function login() {
      $('.ui.modal.login')
        .modal('show')
      ;
    }

    function aboutUs() {
      $('.ui.modal.about.us')
        .modal('show')
      ;
    }

    $('#registerFormId').on('submit', function(event) {
      event.preventDefault();
      
      if($('.ui.modal.register#registerFormId').form('is valid')) {
        $.ajax({
          url: '/client',
          method: 'POST',
          data: $('#registerFormId').serialize(),
          success: function(res) {
            if (res) {
              $('#registerFormId').trigger('reset');

              $('#registerMessageId').show();
              $('#registerMessageId').html("Pendaftaran BERJAYA.");
              $('#registerMessageId').addClass('green');
            } else {
              $('#registerMessageId').show();
              $('#registerMessageId').html("Pendaftaran Gagal.");
              $('#registerMessageId').addClass('red');
            }
          },
          error: function(err) {
            $('#registerMessageId').show();
            $('#registerMessageId').html("Pendaftaran Gagal.");
            $('#registerMessageId').addClass('red');
            console.log('error: ' + err);
          }
        });
      }
    });

    function resetRegisterForm() {
      $('#registerMessageId').hide();
      $('registerFormId').form('clear');
    }
    
    $('#clientSigninId').on('submit', function(event) {
      event.preventDefault();
      
      if($('.ui.form.info#clientSigninId').form('is valid')) {
        $.ajax({
          url: '/client/signin',
          method: 'POST',
          data: $('#clientSigninId').serialize(),
          success: function(res) {
            if (res.data.responseStatus) {
              sessionStorage.setItem('user_id', res.data.responseId);
              sessionStorage.setItem('user_name', res.data.responseName);
              window.location.href = '/client_admin_dashboard';
            } else {
              $('#clientMessageId').show();
              $('#clientMessageId').html(res.data.responseMessage);
            }
          },
          error: function(err) {
            console.log('error: ' + err);
          }
        });
      }
    });

    $('#staffSigninId').on('submit', function(event) {
      event.preventDefault();

      if($('.ui.form.info#staffSigninId').form('is valid')) {
        $.ajax({
          url: '/staff/signin',
          method: 'POST',
          data: $('#staffSigninId').serialize(),
          success: function(res) {
            if (res.data.responseStatus) {
              sessionStorage.setItem('user_id', res.data.responseId);
              sessionStorage.setItem('user_name', res.data.responseName);
              if (res.data.responseRole === 'PETUGAS') {
                window.location.href = '/staff_application_dashboard';
              } else if (res.data.responseRole === 'PENTADBIR') {
                window.location.href = '/admin_dashboard';
              }
            } else {
              $('#staffMessageId').show();
              $('#staffMessageId').html(res.data.responseMessage);
            }
          },
          error: function(err) {
            console.log('error: ' + err);
          }
        });
      }
    });
  </script>
</body>
</html>