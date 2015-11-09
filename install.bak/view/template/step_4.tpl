<?php echo $header; ?>
<h1 style="background: url('view/image/configuration.png') no-repeat;">Step 4 - Kustomisasi</h1>
<div style="width: 100%; display: inline-block;">
  <div style="float: left; width: 569px;">
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <h2>1. Tolong isi data toko anda.</h2>
      <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 15px;">
        <table>
          <tr>
            <td width="185"><span class="required">*</span>Nama Toko:</td>
            <td><input type="text" name="store_name" value="<?php echo $store_name; ?>" />
              <br />
              <?php if ($error_store_name) { ?>
              <span class="required"><?php echo $error_store_name; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td width="185"><span class="required">*</span>Nama Pemilik:</td>
            <td><input type="text" name="store_owner" value="<?php echo $store_owner; ?>" />
              <br />
              <?php if ($error_store_owner) { ?>
              <span class="required"><?php echo $error_store_owner; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td width="185"><span class="required">*</span>Alamat Toko:</td>
            <td><textarea type="text" name="store_address" rows=4><?php echo $store_address; ?></textarea>
              <br />
              <?php if ($error_store_address) { ?>
              <span class="required"><?php echo $error_store_address; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td width="185"><span class="required">*</span>Email:</td>
            <td><input type="text" name="store_email" value="<?php echo $store_email; ?>" />
              <br />
              <?php if ($error_store_email) { ?>
              <span class="required"><?php echo $error_store_email; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td width="185"><span class="required">*</span>Telepon:</td>
            <td><input type="text" name="store_phone" value="<?php echo $store_phone; ?>" />
              <br />
              <?php if ($error_store_phone) { ?>
              <span class="required"><?php echo $error_store_phone; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td>Fax:</td>
            <td><input type="text" name="store_fax" value="<?php echo $store_fax; ?>" /></td>
          </tr>
		  </table>
    </div>

      <h2>2. Module Yahoo Messenger.</h2>
      <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 15px;">
        <table>
			<tr>
			  <td>&nbsp;</td>
			  <td>ID Yahoo</td>
			  <td>Nama</td>
			</tr>
          <tr>
            <td width="185" valign="top">Yahoo Account 1:</td>
            <td><input type="text" name="yahoo_id1" value="<?php echo $yahoo_id1; ?>" /></td>
            <td><input type="text" name="yahoo_name1" value="<?php echo $yahoo_name1; ?>" /></td>
          </tr>
          <tr>
            <td valign="top">Yahoo Account 2:</td>
            <td><input type="text" name="yahoo_id2" value="<?php echo $yahoo_id2; ?>" /></td>
            <td><input type="text" name="yahoo_name2" value="<?php echo $yahoo_name2; ?>" /></td>
          </tr>
          <tr>
            <td valign="top">Yahoo Account 3:</td>
            <td><input type="text" name="yahoo_id3" value="<?php echo $yahoo_id3; ?>" /></td>
            <td><input type="text" name="yahoo_name3" value="<?php echo $yahoo_name3; ?>" /></td>
          </tr>
        </table>
      </div>

      <h2>3. Module Pengiriman JNE.</h2>
      <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 15px;">
        <table>
          <tr>
            <td width="185" valign="top"><span class="required">*</span>Pengiriman Dari:</td>
            <td>
				<select name="store_jne" selected="<?php echo $store_jne; ?>">
					<option value="2">Jakarta</option>
					<option value="3">Bandung</option>
					<option value="4">Bekasi</option>
					<option value="6">Depok &amp; Bogor</option>
					<option value="10">Semarang</option>
					<option value="7">Yogyakarta</option>
					<option value="12">Solo</option>
					<option value="9">Malang</option>
					<option value="5">Surabaya</option>
					<option value="14">Probolinggo</option>
					<option value="15">Banyuwangi</option>
					<option value="11">Lampung</option>
					<option value="13">Pekan Baru</option>
					<option value="8">Medan</option>
				</select>
              <br />
              <?php if ($error_store_jne) { ?>
              <span class="required"><?php echo $error_store_jne; ?></span>
              <?php } ?>
			  </td>
          </tr>
        </table>
		 <p>&nbsp;</p>
		 <p>Saat ini kami baru mempunyai database ongkos kirim dari kota Jakarta dan Bandung. Untuk daerah lain, selama anda bisa dapatkan file XLS ongkos kirim dari agen JNE di kota anda, kami bisa membantu mengkonversikan menjadi database secara GRATIS.</p>
      </div>

      <h2>4. Rekening Bank.</h2>
      <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 15px;">
        <table cellpadding="5">
          <tr>
            <td>Nama Bank</td><td>Nomor Rekening</td><td>Atas Nama</td>
          </tr>
		   <tr>
			  <td><img src="../image/bank/bca.png" /></td>
			  <td valign="middle"><input type="text" name="acc_bca_no"><?php echo $acc_bca_no; ?></td>
			  <td valign="middle"><input type="text" name="acc_bca_an"><?php echo $acc_bca_an; ?></td>
		   </tr>
		   <tr>
			  <td><img src="../image/bank/bni.png" /></td>
			  <td valign="middle"><input type="text" name="acc_bni_no"><?php echo $acc_bni_no; ?></td>
			  <td valign="middle"><input type="text" name="acc_bni_an"><?php echo $acc_bni_an; ?></td>
		   </tr>
		   <tr>
			  <td><img src="../image/bank/mandiri.png" /></td>
			  <td valign="middle"><input type="text" name="acc_mandiri_no"><?php echo $acc_mandiri_no; ?></td>
			  <td valign="middle"><input type="text" name="acc_mandiri_an"><?php echo $acc_mandiri_an; ?></td>
		   </tr>
		   <tr>
			  <td><img src="../image/bank/bri.png" /></td>
			  <td valign="middle"><input type="text" name="acc_bri_no"><?php echo $acc_bri_no; ?></td>
			  <td valign="middle"><input type="text" name="acc_bri_an"><?php echo $acc_bri_an; ?></td>
		   </tr>
		   <tr>
			  <td><img src="../image/bank/niaga.png" /></td>
			  <td valign="middle"><input type="text" name="acc_niaga_no"><?php echo $acc_niaga_no; ?></td>
			  <td valign="middle"><input type="text" name="acc_niaga_an"><?php echo $acc_niaga_an; ?></td>
		   </tr>
		   <tr>
			  <td><img src="../image/bank/permata.png" /></td>
			  <td valign="middle"><input type="text" name="acc_permata_no"><?php echo $acc_permata_no; ?></td>
			  <td valign="middle"><input type="text" name="acc_permata_an"><?php echo $acc_permata_an; ?></td>
		   </tr>
        </table>
		 <p>&nbsp;</p>
		 <p>Untuk bank lainnya, bisa diisi sendiri di bagian Administrasi nantinya. Saat ini kami sudah menyediakan 20 bank yang paling banyak digunakan di Indonesia.</p>
    </div>


      <div style="text-align: right;"><a onclick="document.getElementById('form').submit()" class="button"><span class="button_left button_continue"></span><span class="button_middle">Lanjutkan</span><span class="button_right"></span></a></div>
    </form>
  </div>
  <div style="float: right; width: 205px; height: 400px; padding: 10px; color: #663300; border: 1px solid #FFE0CC; background: #FFF5CC;">
    <ul>
      <li>Lisensi</li>
      <li>Pre-Instalasi</li>
      <li>Konfigurasi</li>
      <li><b>Kustomisasi</b></li>
      <li>Selesai</li>
    </ul>
  </div>
</div>
<?php echo $footer; ?>
