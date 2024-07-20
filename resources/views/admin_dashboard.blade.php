<!DOCTYPE html>
<html lang="en">
<head>
  @include('section.head') 
  <script>
    // $(function() {
    //   $.toast({
    //     displayTime: 6000,
    //     message: 'Anda mempunyai permohonan baru. <a href="https://www.google.com/" style="text-decoration: underline;">Lihat</a>',
    //     class : 'yellow',
    //     className: {
    //       toast: 'ui message'
    //     }
    //   });
    // });
  </script>
</head>
<body>
  @include('section.admin_top_nav')
  <div>
    <div class="ui visible left vertical sidebar menu bg-primary-almond">
      <a class="item h-100px" href="/admin_dashboard"></a>
      <a class="item active" href="/admin_dashboard">
        Laman Utama
      </a>
      <a class="item" href="/admin_staff_dashboard">
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
          <h2>LAMAN UTAMA</h2>
        </div>
      </div>
      <div class="p-2em">
        <div class="grid-4-equal">
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Petugas</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='staff_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Pelangggan</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='customer_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Permohonan</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='application_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
          <div>
            <div class="ui card w-100pct">
              <div class="content">
                <div class="header">Jumlah Peralatan Perubatan</div>
                <div class="meta" style="margin-top: 4px;">data sehingga 08 Jun 2024, 05:30 pm</div>
              </div>
              <div class="content">
                <h1>500</h1>
              </div>
              <div class="extra content">
                <button class="ui right labeled icon teal button w-100pct" onclick="window.location.href='equipment_dashboard.html'">
                  <i class="right arrow icon"></i>
                  Lihat Butiran
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('section.admin_modal')
  @include('section.admin_modal_script')
  <script></script>
</body>
</html>