<?php
validation_errors();

if($detailaduan[0]['status']=='0'){
  $status='menunggu';
}else{
  $status=$detailaduan[0]['status'];
}
echo '
<div class="card mb-3">
  <img src="'.base_url('img/').$detailaduan[0]['foto'].'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Laporan dari :'.$detailaduan[0]['nama'].'</h5>
    <p class="card-text">'.$detailaduan[0]['isi_laporan'].'</p>
    <p class="card-text"> Status :'.$status.'</p>
  </div>';
  // var_dump($aduantanggapan);
  $index=0;
  foreach($aduantanggapan as $at){

    echo '<div class="card-footer">
    <p>'.$at['tgl_tanggapan'].'</p>
    <p>'.$at['tanggapan'].'</p>
    </div>';
    $index++;
  }
  
  echo '<div class="card-footer">
  <form action="'.base_url('petugas/tambahtanggapan/').$detailaduan[0]['id_pengaduan'].'" method="post">
  <div class="form-floating">
  <textarea class="form-control"  id="tanggapan" name="tanggapan" required></textarea>
  <label for="tanggapan">Tanggapan</label>
  <button type="submit" class="btn btn-sm btn-primary mt-3 float-end">Kirim</button>
</div>
  </form>
  </div>
</div>';
?>