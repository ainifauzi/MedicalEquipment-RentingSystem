<script>
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
      url: '/client/' + sessionStorage.getItem('user_id')
    }).then(function(res) {
      onSetForm('updateProfileFormId', res.data);
      $('#clientMembership').html(res.data.clientMembership);

      $('.ui.modal.profile')
        .modal('show')
      ;
    });
  }

  function displayNotification() {
    $('.ui.tiny.modal.notification')
      .modal('show')
    ;
  }

  $('#updateProfileFormId').on('submit', function(event) {
    event.preventDefault();
    
    $.ajax({
      url: '/client',
      method: 'PUT',
      data: $('#updateProfileFormId').serialize(),
      success: function(res) {
        if (res) {
          onSetForm('updateProfileFormId', res.data);
          $('#clientMembership').html(res.data.clientMembership);
        }
      },
      error: function(err) {
        console.log('error: ' + err);
      }
    });
  });
</script>