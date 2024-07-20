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
      url: '/staff/' + sessionStorage.getItem('user_id')
    }).then(function(res) {
      onSetForm('updateProfileFormId', res.data);
      $('#staffRole').html(res.data.staffRole);

      $('.ui.modal.profile')
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
        }
      },
      error: function(err) {
        console.log('error: ' + err);
      }
    });
  });
</script>