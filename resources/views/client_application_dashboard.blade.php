<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('#clientId').val(sessionStorage.getItem('user_id'));

      $.ajax({
        type: 'GET',
        url: '/equipments'
      }).then(function(res) {
        if (res.data.length) {
          res.data.forEach((element, index, array) => {
            $('#equipmentOptionId').append(`<div class="item" data-value="${element.equipmentId}">${element.equipmentName}</div>`);
          });
        }
      });

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
				url: `/applications/client/${sessionStorage.getItem('user_id')}`
			}).then(function(res) {
				for (let application of res.data) {
          let detailButton = `<button class="ui right labeled icon olive button" onclick="detailPrompt('${application.applicationId}')"><i class="info icon"></i>Butiran</button>`;
          let deleteButton = `<button class="ui right labeled icon orange button" onclick="deletePrompt('${application.applicationId}')"><i class="eraser icon"></i>Hapus</button>`;
          let paymentButton = `<button class="ui right labeled icon teal button" onclick="paymentPrompt('${application.paymentId}')"><i class="credit card outline icon"></i>Bayar</button>`;

					$('#datatable > tbody:last').append($('<tr>')
						.append($('<td>').append(application.clientName))
						.append($('<td>').append(application.equipmentName))
						.append($('<td>').append(`<a class="ui ${application.applicationColor} label">${application.applicationStatus}</a>`))
						.append($('<td>').append(`<a class="ui ${application.paymentColor} label">${application.paymentStatus}</a>`))
						.append($('<td>').append(detailButton).append(deleteButton).append(paymentButton))
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
        <div class="ui bottom attached segment" style="overflow-x: scroll">
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
  <form class="ui modal insert" id="insertFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Maklumat Permohonan</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <input type="hidden" name="clientId" id="clientId">
        <input type="hidden" name="applicationStatus" id="applicationStatus" value="Dalam Proses">
        <div class="two fields">
          <div class="field">
            <label>Peralatan</label>
            <div class="ui selection dropdown equipment">
              <input type="hidden" name="equipmentId" required>
              <i class="dropdown icon"></i>
              <div class="default text">sila pilih peralatan</div>
              <div class="menu" id="equipmentOptionId"></div>
            </div>
          </div>
          <div class="field">
            <label>Surat Sakit</label>
            <input type="file">
          </div>
        </div>
        <div class="three fields">
          <div class="field">
            <label>Tarikh Mula Sewaan</label>
            <input type="date" name="applicationStartDate" required>
          </div>
          <div class="field">
            <label>Tarikh Tamat Sewaan</label>
            <input type="date" name="applicationEndDate" required>
          </div>
          <div class="field">
            <label>Kuantiti</label>
            <input type="number" placeholder="sila isi kuantiti peralatan" name="applicationQuantity" required>
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
  <form class="ui tiny modal payment" id="paymentFormId" method="post" enctype="multipart/form-data">
    <div class="header bg-primary-grey">Pembayaran</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <input type="hidden" name="paymentId" id="paymentId">
        <input type="hidden" name="paymentDate" id="paymentDate">
        <input type="hidden" name="paymentStatus" id="paymentStatus">
        <div class="field">
          <label>Peralatan</label>
          <input type="text" readonly name="equipmentName">
        </div>
        <div class="field">
          <label>Jumlah</label>
          <input type="number" readonly name="paymentAmount">
        </div>
        <div class="field">
          <label>Resit</label>
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
  <div class="ui tiny modal delete">
    <div class="content">
      <input type="hidden" id="deleteInputId">
      Adakah anda pasti untuk <b>hapuskan</b> data berikut?
    </div>
    <div class="actions">
      <button type="button" class="ui right labeled icon deny red button">
        <i class="close icon"></i>
        Batal
      </button>
      <button type="button" onclick="deleteData()" class="ui right labeled icon green button">
        <i class="checkmark icon"></i>
        Hapus
      </button>
    </div>
  </div>
  @include('section.client_modal')
  @include('section.client_modal_script')
  <script>
    function insertPrompt() {
      $('.ui.modal.insert')
        .modal('show')
      ;
    }

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

    function paymentPrompt(paymentId) {
      $.ajax({
				type: 'GET',
				url: `/payment/${paymentId}`
			}).then(function(res) {
        onSetForm('paymentFormId', res.data);

        let today = new Date();
        let formattedDate = today.toISOString().substr(0, 10);
        $('#paymentDate').val(formattedDate);
        $('#paymentStatus').val('Dalam Proses');

        $('.ui.tiny.modal.payment')
          .modal('show')
        ;
			});
    }

    function deletePrompt(deleteId) {
      $('#deleteInputId').val(deleteId);
      $('.ui.tiny.modal.delete')
        .modal('show')
      ;
    }
    
    function deleteData() {
      $.ajax({
				type: 'DELETE',
				url: `/application/${$('#deleteInputId').val()}`
			}).then(function(res) {
        if (res.data) {
          getTable();

          $('.ui.tiny.modal.delete')
            .modal('hide')
          ;
        }
			});
    }

    $('#insertFormId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/application',
        method: 'POST',
        data: $('#insertFormId').serialize(),
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

    $('#paymentFormId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/payment',
        method: 'PUT',
        data: $('#paymentFormId').serialize(),
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