<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      $('.selection.dropdown')
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
        url: `/staffs`
      }).then(function(res) {
        for (let staff of res.data) {
          let detailButton = `<button class="ui right labeled icon olive button" onclick="detailPrompt('${staff.staffId}')"><i class="info icon"></i>Butiran</button>`;
          let deleteButton = `<button class="ui right labeled icon orange button" onclick="deletePrompt('${staff.staffId}')"><i class="eraser icon"></i>Hapus</button>`;

          $('#datatable > tbody:last').append($('<tr>')
            .append($('<td>').append(staff.staffIcNumber))
            .append($('<td>').append(staff.staffName))
            .append($('<td>').append(staff.staffEmail))
            .append($('<td>').append(staff.staffPhoneNo))
            .append($('<td>').append(detailButton).append(deleteButton))
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
  @include('section.staff_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/admin_dashboard"></a>
      <a class="item" href="/admin_dashboard">
        Laman Utama
      </a>
      <a class="item active" href="/admin_staff_dashboard">
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
          <h2>PETUGAS</h2>
        </div>
      </div>
      <div class="p-2em">
        <div class="ui top attached segment">
          <button class="ui right labeled violet icon button" onclick="insert()">
            <i class="plus icon"></i>
            Daftar Baru
          </button>
        </div>
        <div class="ui bottom attached segment" style="overflow-x: scroll">
          <table id="datatable" class="display">
            <thead>
              <tr>
                <th>Nombor KP</th>
                <th>Nama Penuh</th>
                <th>E-mel</th>
                <th>Peranan</th>
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
    <div class="header bg-primary-grey">Maklumat Akaun</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <input type="hidden" name="staffId">
        <div class="two fields">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" placeholder="sila isi nombor kad pengenalan" name="staffIcNumber" required>
          </div>
          <div class="field">
            <label>Nama Penuh</label>
            <input type="text" placeholder="sila isi nama penuh" name="staffName" required>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>E-mel</label>
            <input type="email" placeholder="sila isi alamat e-mel" name="staffEmail" required>
          </div>
          <div class="field">
            <label>Nombor Telefon</label>
            <input type="text" placeholder="sila isi nombor telefon" name="staffPhoneNo" required>
          </div>
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea class="resize-none" rows="3" name="staffAddress" required></textarea>
        </div>
        <div class="field">
          <label>Peranan</label>
          <div class="ui selection dropdown profile role">
            <input type="hidden" name="staffRole" required>
            <i class="dropdown icon"></i>
            <div class="text" id="staffRole"></div>
            <div class="menu">
              <div class="item" data-value="Petugas">Petugas</div>
              <div class="item" data-value="Pentadbir">Pentadbir</div>
            </div>
          </div>
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
    <div class="header bg-primary-grey">Maklumat Akaun</div>
    <div class="content bg-primary-grey">
      <div class="ui form info">
        <div class="two fields">
          <div class="field">
            <label>Nombor KP</label>
            <input type="text" readonly name="staffIcNumber">
          </div>
          <div class="field">
            <label>Nama Penuh</label>
            <input type="text" readonly name="staffName">
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>E-mel</label>
            <input type="email" readonly name="staffEmail">
          </div>
          <div class="field">
            <label>Nombor Telefon</label>
            <input type="text" readonly name="staffPhoneNo">
          </div>
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea class="resize-none" rows="3" readonly name="staffAddress"></textarea>
        </div>
        <div class="field">
          <label>Peranan</label>
          <input type="text" readonly name="staffRole">
        </div>
      </div>
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
  @include('section.staff_modal')
  @include('section.staff_modal_script')
  <script>
    function insert() {
      $('.ui.modal.insert')
        .modal('show')
      ;
    }
    function detailPrompt(staffId) {
      $.ajax({
        type: 'GET',
        url: '/staff/' + staffId
      }).then(function(res) {
        onSetForm('detailFormId', res.data);

        $('.ui.modal.detail')
          .modal('show')
        ;
      });
    }

    $('#insertFormId').on('submit', function(event) {
      event.preventDefault();
      
      $.ajax({
        url: '/staff',
        method: 'POST',
        data: $('#insertFormId').serialize(),
        success: function(res) {
          if (res) {
            getTable();
            $('#insertFormId').trigger('reset');
            $('.ui.modal.insert')
              .modal('hide')
            ;
          }
        },
        error: function(err) {
          console.log('error: ' + err);
        }
      });
    });

    function deletePrompt(deleteId) {
      $('#deleteInputId').val(deleteId);
      $('.ui.tiny.modal.delete')
        .modal('show')
      ;
    }
    
    function deleteData() {
      $.ajax({
				type: 'DELETE',
				url: `/staff/${$('#deleteInputId').val()}`
			}).then(function(res) {
        if (res.data) {
          getTable();

          $('.ui.tiny.modal.delete')
            .modal('hide')
          ;
        }
			});
    }
  </script>
</body>
</html>