<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    $(function() {
      displayDashboard();
      displayNotification();
    });

    function displayDashboard() {
      $.ajax({
        type: 'GET',
        url: '/dashboard/client'
      }).then(function(res) {
        let currentTime = displayCurrentTime();

        if (res.data.length) {
          res.data.forEach((element, index, array) => {
            let div = $('<div>');
            let card = $('<div>', { class: 'ui card w-100pct' });
            
            let header = $('<div>', { class: 'content' }).append(
              $('<div>', { class: 'header', text: element.equipmentName }),
              $('<div>', { class: 'meta', text: currentTime, css: { marginTop: '4px' } })
            );
            
            let content = $('<div>', { class: 'content' }).append(
              $('<h1>', { text: element.totalEquipment })
            );
            
            let footer = $('<div>', { class: 'extra content' }).append(
              $('<button>', { class: 'ui red button', text: element.totalUnavailableEquipment }),
              $('<button>', { class: 'ui green button', text: element.totalAvailableEquipment })
            );
            
            card.append(header, content, footer);
            div.append(card);
            $('#cardContainer').append(div);
          });
        }
        console.log(res.data)
      });
    }

    function displayCurrentTime() {
      const currentDate = new Date();

      const optionsDate = { 
        day: '2-digit', 
        month: 'short', 
        year: 'numeric' 
      };

      const optionsTime = { 
        hour: '2-digit', 
        minute: '2-digit', 
        hour12: true 
      };

      const formattedDate = currentDate.toLocaleDateString('en-GB', optionsDate);
      const formattedTime = currentDate.toLocaleTimeString('en-US', optionsTime);

      return `data sehingga ${formattedDate}, ${formattedTime}`;
    }
    
    function displayNotification() {
      $.ajax({
        type: 'GET',
        url: '/dashboard/client/noti'
      }).then(function(res) {
        if (res.data.length) {
          res.data.forEach((element, index, array) => {
            let message = element.applicationStatus === 'BERJAYA' ? 'diluluskan' : 'ditolak';
            let color = element.applicationStatus === 'BERJAYA' ? 'green' : 'red';

            if (element.clientNotiStatus === 0) {
              $.toast({
                displayTime: 10000,
                message: `Permohonan anda telah <b>${message}</b>`,
                class : color,
                className: {
                  toast: 'ui message'
                }
              });
            }

            var $segment = $('<div>', { class: 'ui segment' });
            
            var $paragraph = $('<p>').text('Permohonan ');
            var $link = $('<a>', { href: '/client_application_dashboard', text: element.equipmentName });
            var $textAfterLink = document.createTextNode(` anda telah ${message}.`);
            
            $paragraph.append($link).append($textAfterLink);
            $segment.append($paragraph);
            
            $('#segmentContainer').append($segment);
          })
        }
      });
    }
  </script>
</head>
<body>
  @include('section.client_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/client_admin_dashboard"></a>
      <a class="item active" href="/client_admin_dashboard">
        Laman Utama
      </a>
      <a class="item" href="/client_application_dashboard">
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
          <h2>LAMAN UTAMA</h2>
        </div>
      </div>
      <div class="p-2em">
        <div class="grid-4-equal" id="cardContainer"></div>
      </div>
    </div>
  </div>
  @include('section.client_modal')
  @include('section.client_modal_script')
  <script></script>
</body>
</html>