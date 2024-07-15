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

      getTable();
    });

    function getTable() {
      $('#datatable').DataTable().clear().destroy();

      $.ajax({
        type: 'GET',
        url: `/applications`
      }).then(function(res) {
        for (let application of res.data) {
          let returnButton = `<button class="ui right labeled icon brown button" onclick="returnPrompt('${application.returnId}')"><i class="info icon"></i>Pemulangan</button>`;

          $('#datatable > tbody:last').append($('<tr>')
            .append($('<td>').append(application.clientName))
            .append($('<td>').append(application.equipmentName))
            .append($('<td>').append(`<a class="ui ${application.applicationColor} label">${application.applicationStatus}</a>`))
            .append($('<td>').append(`<a class="ui ${application.paymentColor} label">${application.paymentStatus}</a>`))
            .append($('<td>').append(returnButton))
          );
        }

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
    }
  </script>
</head>
<body>
  <div class="topnav border-top border-bottom">
    <a class="p-15px-25px" href="#"></a>
    <a class="p-15px-25px" href="javascript:void(0);" onclick="promptLogout()">Log Keluar</a>
    <a class="p-15px-25px" href="javascript:void(0);" onclick="displayProfile()">Profil</a>
  </div>
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/staff_application_dashboard"></a>
      <a class="item active" href="/staff_application_dashboard">
        Permohonan Sewaan
      </a>
      <a class="item" href="/staff_history_dashboard">
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
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <form class="ui tiny modal return" id="returnFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Maklumat Pemulangan</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <input type="hidden" name="returnId" id="returnId">
        <div class="field">
          <label>Tarikh Pemulangan</label>
          <input type="date" name="returnDate" required>
        </div>
        <div class="field">
          <label>Keadaan Peralatan</label>
          <div class="ui selection dropdown condition">
            <input type="hidden" name="returnCondition">
            <i class="dropdown icon"></i>
            <div class="text" id="returnCondition"></div>
            <div class="menu">
              <div class="item" data-value="Baik">Baik</div>
              <div class="item" data-value="Rosak">Rosak</div>
            </div>
          </div>
        </div>
        <div class="field">
          <label>Bukti Pemulangan</label>
          <input type="file">
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
  @include('section.staff_modal')
  @include('section.staff_modal_script')
  <script>
    function returnPrompt(returnId) {
      $.ajax({
				type: 'GET',
				url: `/return/${returnId}`
			}).then(function(res) {
        onSetForm('returnFormId', res.data);
        $('#returnCondition').html(res.data.returnCondition);

        $('.ui.modal.return')
          .modal('show')
        ;
			});
    }

    $('#returnFormId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/return',
        method: 'PUT',
        data: $('#returnFormId').serialize(),
        success: function(res) {
          if (res) {
            getTable();
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