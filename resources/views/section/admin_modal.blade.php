<!-- profile modal -->
<form class="ui modal profile" id="updateProfileFormId" method="post" enctype="multipart/form-data">
  <div class="header bg-primary-grey">Maklumat Akaun</div>
  <div class="content bg-primary-grey">
    <div class="ui form info">
      <div class="ui message" id="updateProfileMessageId"></div>
      <input type="hidden" name="staffId">
      <div class="two fields">
        <div class="field">
          <label>Nombor KP</label>
          <input type="text" name="staffIcNumber" readonly>
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
    <button onclick="resetUpdateProfileForm()" type="button" class="ui right labeled icon deny red button">
      <i class="close icon"></i>
      Batal
    </button>
    <button type="submit" class="ui right labeled icon green button">
      <i class="checkmark icon"></i>
      Simpan
    </button>
  </div>
</form>
<!-- logout prompt modal -->
<div class="ui tiny modal logout">
  <div class="content">
    Adakah anda pasti untuk <i>log keluar?</i>
  </div>
  <div class="actions">
    <button class="ui right labeled icon deny red button">
      <i class="close icon"></i>
      Batal
    </button>
    <button class="ui right labeled icon green button" onclick="logout()">
      <i class="checkmark icon"></i>
      Log Keluar
    </button>
  </div>
</div>
<!-- notification modal -->
<div class="ui tiny modal notification">
  <div class="header bg-primary-grey">Notifikasi</div>
  <div class="content">
    <div class="ui segments">
      <div class="ui segment">
        <p>Permohonan <a href="">KERUSI RODA</a> anda telah diluluskan.</p>
      </div>
      <div class="ui segment">
        <p>Middle</p>
      </div>
      <div class="ui segment">
        <p>Middle</p>
      </div>
      <div class="ui segment">
        <p>Middle</p>
      </div>
      <div class="ui segment">
        <p>Bottom</p>
      </div>
    </div>
  </div>
  <div class="actions">
    <button class="ui right labeled icon deny button">
      <i class="close icon"></i>
      Tutup
    </button>
  </div>
</div>