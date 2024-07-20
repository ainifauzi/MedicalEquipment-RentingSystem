<script>
  $('#updateProfileMessageId').hide();

  function promptLogout() {
    $('.ui.tiny.modal.logout')
      .modal('show')
    ;
  }

  function logout() {
    sessionStorage.clear();
    window.location.href = '/';
  }

  function displayProfile() {
    $.ajax({
      type: 'GET',
      url: '/staff/' + sessionStorage.getItem('user_id')
    }).then(function(res) {
      onSetForm('updateProfileFormId', res.data);
      $('#staffRole').html(res.data.staffRole);

      $('.ui.modal.profile')
        .modal('setting', 'closable', false)
        .modal('show')
      ;
    });
  }

  $('#updateProfileFormId').on('submit', function(event) {
    event.preventDefault();
    
    $.ajax({
      url: '/staff',
      method: 'PUT',
      data: $('#updateProfileFormId').serialize(),
      success: function(res) {
        if (res) {
          onSetForm('updateProfileFormId', res.data);
          $('#staffRole').html(res.data.staffRole);
          
          $('#updateProfileMessageId').show();
          $('#updateProfileMessageId').html("Pendaftaran Berjaya.");
          $('#updateProfileMessageId').addClass('green');
        } else {
          $('#updateProfileMessageId').show();
          $('#updateProfileMessageId').html("Pendaftaran Gagal.");
          $('#updateProfileMessageId').addClass('red');
        }
      },
      error: function(err) {
        $('#updateProfileMessageId').show();
        $('#updateProfileMessageId').html("Pendaftaran Gagal.");
        $('#updateProfileMessageId').addClass('red');
        console.log('error: ' + err);
      }
    });
  });

  function resetUpdateProfileForm() {
    $('#updateProfileMessageId').hide();
    $('.ui.modal.profile#updateProfileFormId').form('clear');
  }

  function displayNotification() {
    $('.ui.tiny.modal.notification')
      .modal('show')
    ;
  }
</script>