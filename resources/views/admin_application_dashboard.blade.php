<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('.selection.dropdown.application.status')
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

      getTable();
    });

    function getTable() {
      $('#datatable').DataTable().clear().destroy();

      $.ajax({
        type: 'GET',
        url: `/applications`
      }).then(function(res) {
        for (let application of res.data) {
          let detailButton = `<button class="ui right labeled icon olive button" onclick="detailPrompt('${application.applicationId}')"><i class="info icon"></i>Butiran</button>`;
          let updateButton = `<button class="ui right labeled icon teal button" onclick="updatePrompt('${application.applicationId}')"><i class="pen icon"></i>Kemaskini</button>`;
          let medicLetterButton = `<button class="ui right labeled icon purple button" onclick="medicalLetterPrompt('${application.applicationId}')"><i class="expand alternate icon"></i>Surat Sakit</button>`;
          
          $('#datatable > tbody:last').append($('<tr>')
            .append($('<td>').append(application.clientName))
            .append($('<td>').append(application.equipmentName))
            .append($('<td>').append(`<a class="ui ${application.applicationColor} label">${application.applicationStatus}</a>`))
            .append($('<td>').append(`<a class="ui ${application.paymentColor} label">${application.paymentStatus}</a>`))
            .append($('<td>').append(detailButton).append(updateButton).append(medicLetterButton))
          );
        }

        $('#datatable').DataTable({
          "paging": false,
          "ordering": true,
          "searching": true,
          "info": false,
          "language": {
            "search": "<i class='fas fa-search'></i> Cari"
          }
        });
      });
    }
  </script>
</head>
<body>
  @include('section.admin_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item" href="/client_admin_dashboard">
        <h3>SISTEM SEWAAN <br> PERALATAN PERUBATAN</h3>
      </a>
      <a class="item" href="/admin_dashboard"><i class="fas fa-home"></i>
        Laman Utama
      </a>
      <a class="item" href="/admin_staff_dashboard"><i class='fas fa-user-tie'></i>
        Petugas
      </a>
      <a class="item" href="/admin_customer_dashboard"><i class="fas fa-user"></i>
        Pelanggan
      </a>
      <a class="item" href="/admin_equipment_dashboard"><i class="fas fa-medkit"></i>
        Peralatan
      </a>
      <a class="item active" href="/admin_application_dashboard"><i class="fa fa-envelope"></i>
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
        <div class="ui segment" style="overflow-x: scroll">
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
          </table>
        </div>
      </div>
    </div>
  </div>
  <form class="ui modal detail" id="detailFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Maklumat Permohonan</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <div class="two fields">
          <div class="field">
            <label>Peralatan</label>
            <input type="text" readonly name="equipmentName">
          </div>
          <div class="field">
            <label>Status Permohonan</label>
            <input type="text" readonly name="applicationStatus">
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Kuantiti</label>
            <input type="text" readonly name="applicationQuantity">
          </div>
          <div class="field">
            <label>Tarikh Mula Sewaan</label>
            <input type="text" readonly name="applicationStartDate">
          </div>
          <div class="field">
            <label>Tarikh Tamat Sewaan</label>
            <input type="text" readonly name="applicationEndDate">
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Harga Sewaan</label>
            <input type="text" readonly name="applicationRentPrice">
          </div>
          <div class="field">
            <label>Status Pembayaran</label>
            <input type="text" readonly name="paymentStatus">
          </div>
          <div class="field">
            <label>Tarikh Pembayaran</label>
            <input type="text" readonly name="paymentDate">
          </div>
        </div>
      </div>
    </div>
    <div class="actions bg-primary-grey">
      <button type="button" class="ui right labeled icon deny grey button">
        <i class="close icon"></i>
        Tutup
      </button>
    </div>
  </form>
  <form class="ui modal update" id="updateFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Maklumat Permohonan</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <input type="hidden" name="applicationId" id="applicationId">
        <input type="hidden" name="adminNotiStatus">
        <input type="hidden" name="clientNotiStatus" id="clientNotiStatus">
        <div class="two fields">
          <div class="field">
            <label>Peralatan</label>
            <input type="text" disabled name="equipmentName">
          </div>
          <div class="field">
            <label>Status Permohonan</label>
            <div class="ui selection dropdown application status">
              <input type="hidden" name="applicationStatus">
              <i class="dropdown icon"></i>
              <div class="text" id="applicationStatus"></div>
              <div class="menu">
                <div class="item" data-value="LULUS">LULUS</div>
                <div class="item" data-value="GAGAL">GAGAL</div>
              </div>
            </div>
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Kuantiti</label>
            <input type="text" disabled name="applicationQuantity">
          </div>
          <div class="field">
            <label>Tarikh Mula Sewaan</label>
            <input type="text" disabled name="applicationStartDate">
          </div>
          <div class="field">
            <label>Tarikh Tamat Sewaan</label>
            <input type="text" disabled name="applicationEndDate">
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Harga Sewaan</label>
            <input type="text" disabled name="applicationRentPrice">
          </div>
          <div class="field">
            <label>Status Pembayaran</label>
            <input type="text" disabled name="paymentStatus">
          </div>
          <div class="field">
            <label>Tarikh Pembayaran</label>
            <input type="text" disabled name="paymentDate">
          </div>
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
        Simpan
      </button>
    </div>
  </form>
  
  <div class="ui small modal medical letter">
    <div class="header bg-primary-grey">Gambar Surat Sakit</div>
    <div class="scrolling content">
      <img id="applicationMedicLetterId" alt="Medical Letter">
    </div>
    <div class="actions">
      <button onclick="resetMedicalLetterPrompt()" type="button" class="ui right labeled icon deny button">
        <i class="close icon"></i>
        Tutup
      </button>
      <a id="applicationMedicLetterDownloadId" class="ui right labeled icon blue button">
        <i class="arrow down icon"></i>
        Muat Turun
      </a>
    </div>
  </div>
  @include('section.staff_modal')
  @include('section.staff_modal_script')
  
  <script>
    function detailPrompt(applicationId) {
      $.ajax({
        type: 'GET',
        url: `/application/${applicationId}`
      }).then(function(res) {
        onSetForm('detailFormId', res.data);

        $('.ui.modal.detail')
          .modal('show')
        ;
      });
    }

    function updatePrompt(applicationId) {
      $.ajax({
        type: 'GET',
        url: `/application/${applicationId}`
      }).then(function(res) {
        onSetForm('updateFormId', res.data);
        $('#applicationStatus').html(res.data.applicationStatus);
        $('#clientNotiStatus').val(0);

        $('.ui.modal.update')
          .modal('show')
        ;
      });
    }

    $('#updateFormId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/application',
        method: 'PUT',
        data: $('#updateFormId').serialize(),
        success: function(res) {
          if (res) {
            getTable();

            $('.ui.modal.update')
              .modal('hide')
            ;
          }
        },
        error: function(err) {
          console.log('error: ' + err);
        }
      });
    });

    function medicalLetterPrompt(applicationId) {
      $.ajax({
        type: 'GET',
        url: '/application/file/' + applicationId
      }).then(function(res) {
        $('#applicationMedicLetterId').attr('src', `data:image/jpeg;base64,${res.data}`);
        $('#applicationMedicLetterDownloadId').attr('href', `data:image/jpeg;base64,${res.data}`);
        $('#applicationMedicLetterDownloadId').attr('download', 'Surat Sakit');

        $('.ui.small.modal.medical.letter')
          .modal('show')
        ;
      });
    }

    function resetMedicalLetterPrompt() {
      $('#applicationMedicLetterId').attr('src', '');
      $('#applicationMedicLetterDownloadId').attr('href', '');
      $('#applicationMedicLetterDownloadId').attr('download', '');
    }
  </script>
</body>
</html>