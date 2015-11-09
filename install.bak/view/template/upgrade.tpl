<?php echo $header; ?>
<h1 style="background: url('view/image/configuration.png') no-repeat;">Upgrade</h1>
<div style="width: 100%; display: inline-block;">
  <div style="float: left; width: 569px;">
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <p><b>Simak dan ikuti langkah-langkah berikut ini!</b></p>
	  <ol>
	    <li>Sebelum melakukan upgrade, backup dulu database anda!</li>
		<li>Setelah upgrade, hapus cookies dari browser, kemudian tutup browsernya.</li>
	  </ol>
	  
      <h2>Module Pengiriman JNE</h2>
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
	
      <div style="text-align: right;"><a onclick="document.getElementById('form').submit()" class="button"><span class="button_left button_continue"></span><span class="button_middle">Upgrade</span><span class="button_right"></span></a></div>
    </form>
  </div>
  <div style="float: right; width: 205px; height: 400px; padding: 10px; color: #663300; border: 1px solid #FFE0CC; background: #FFF5CC;">
    <ul>
      <li><b>Upgrade</b></li>
      <li>Finished</li>
    </ul>
  </div>
</div>
<?php echo $footer; ?>

