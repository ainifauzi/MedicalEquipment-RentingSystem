<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head')
  <script>
    // $(function() {
    //   $.toast({
    //     displayTime: 6000,
    //     message: 'Permohonan anda telah diluluskan.',
    //     class : 'green',
    //     className: {
    //       toast: 'ui message'
    //     }
    //   });
    // });
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
        <div class="grid-4-equal">
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">KERUSI RODA</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui red button">100</button>
                <button class="ui green button">400</button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">KATIL</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui red button">100</button>
                <button class="ui green button">400</button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">TANGKI OKSIGEN</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui red button">100</button>
                <button class="ui green button">400</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('section.client_modal')
  @include('section.client_modal_script')
  <script>
  </script>
</body>
</html>