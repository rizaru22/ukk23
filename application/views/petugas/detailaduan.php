<?php
validation_errors();
echo '
<div class="card mb-3">
  <img src="'.base_url('img/').$detailaduan[0]['foto'].'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Laporan dari :'.$detailaduan[0]['nama'].'</h5>
    <p class="card-text">'.$detailaduan[0]['isi_laporan'].'</p>
    <p class="card-text">
    <form action="'.base_url('petugas/ubahstatus/').$detailaduan[0]['id_pengaduan'].'" method="post">
    <div class="row g-5 align-items-center">
  <div class="col-auto">
    <label for="status" class="col-form-label">Status</label>
  </div>
  <div class="col-auto">
  <select name="status" id="status" class="form-select">
  <option value="0"'; if ($detailaduan[0]['status']=='0') {echo "selected";} echo'>Menunggu</option>
  <option value="proses"'; if ($detailaduan[0]['status']=='proses') {echo "selected";} echo '>Proses</option>
  <option value="selesai"'; if ($detailaduan[0]['status']=='selesai') {echo "selected";} echo'>Selesai</option>
  </select>
  </div>
  <div class="col-auto">
  <button type="submit" class="btn btn-sm btn-primary">ubah status </button>
  </div>
</div>
       
</form>
    </p>
    
  </div>
</div>';
?>