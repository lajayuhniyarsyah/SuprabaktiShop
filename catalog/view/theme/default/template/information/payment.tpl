<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>

  <?php if (!isset($text_message)) { ?>
    <form action="<?php echo str_replace('&', '&amp;', $action); ?>" method="post" enctype="multipart/form-data" id="pembayaran">
      <div style="padding: 5px; background-color: #eee; font-size: 12pt; font-weight: bold; margin-bottom: 5px; color: black;"><?php echo $text_info; ?></div>
      <div class="content">            
        <table width="100%">
          <?php if ($this->customer->isLogged()) { ?>
          <tr>
            <td width="160"><b><span class="required">*</span> <?php echo $entry_nama; ?></b></td>
            <td>
            	<input type="text" name="nama" size="30" class="tableLogin" value="<?php echo $nama; ?>" />
            	<?php if ($error_nama) { ?>
            		<span class="error"><?php echo $error_nama; ?></span>
            	<?php } ?>
            </td>
          </tr>
          
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_email; ?></b></td>
            <td>
            	<input type="text" name="email" size="30" class="tableLogin" value="<?php echo $email; ?>" />
            	<?php if ($error_email) { ?>
            		<span class="error"><?php echo $error_email; ?></span>
            	<?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_telp; ?></b></td>
            <td>
            	<input type="text" name="telp" size="30" class="tableLogin" value="<?php echo $telp; ?>" />
            	<?php if ($error_telp) { ?>
            		<span class="error"><?php echo $error_telp; ?></span>
            	<?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_order_id; ?></b></td>
            <td>
            <select name="order_id" size="1" class="tableLogin">
            <?php foreach ($orders as $order) { ?>
            <option value="<?php echo 'Order #' . $order['order_id'] . ' tgl. '.$order['date_added'].'&nbsp;&nbsp;&nbsp;('.$order['total'].' - '.$order['products'].' item)';?>"><?php echo 'Order tgl. '.$order['date_added'].' ('.$order['total'].' - '.$order['products'].' item)';?></option>
            <?php } ?>
            </select>            
            <?php if ($error_order_id) { ?>
            <span class="error"><?php echo $error_order_id; ?></span>
            <?php } ?>
            </td>
          </tr>
          <?php } else {?>
          <tr>
            <td width="160"><b><span class="required">*</span> <?php echo $entry_nama; ?></b></td>
            <td>
            	<input type="text" name="nama" size="30" class="tableLogin" value="<?php echo $nama; ?>" />
            	<?php if ($error_nama) { ?>
            		<span class="error"><?php echo $error_nama; ?></span>
            	<?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_email; ?></b></td>
            <td>
            	<input type="text" name="email" size="30" class="tableLogin" value="<?php echo $email; ?>"/>
            	<?php if ($error_email) { ?>
            		<span class="error"><?php echo $error_email; ?></span>
            	<?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_telp; ?></b></td>
            <td>
            	<input type="text" name="telp" size="30" class="tableLogin" value="<?php echo $telp; ?>"/>
            	<?php if ($error_telp) { ?>
            		<span class="error"><?php echo $error_telp; ?></span>
            	<?php } ?>
            </td>
          </tr>          
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_order_id; ?></b></td>
            <td>
            <input type="text" name="order_id" size="30" class="tableLogin" value="<?php echo $order_id; ?>"/>
            <?php if ($error_order_id) { ?>
            <span class="error"><?php echo $error_order_id; ?></span>
            <?php } ?>
            </td>
          </tr>
          <?php }?>
        </table>
      </div>
      <div style="padding: 5px; background-color: #eee; font-size: 12pt; font-weight: bold; margin-bottom: 5px; color: black;"><?php echo $text_pelanggan; ?></div>
      <div class="content">
        <table width="100%">    
          <tr>
            <td width="160"><b><span class="required">*</span> <?php echo $entry_dari_bank; ?></b></td>
            <td>
            <input type="text" name="dari_bank" size="30" class="tableLogin" value="<?php echo $dari_bank; ?>"/>
            <?php if ($error_dari_bank) { ?>
            <span class="error"><?php echo $error_dari_bank; ?></span>
            <?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_no_rekening; ?></b></td>
            <td>
            <input type="text" name="no_rekening" size="30" class="tableLogin" value="<?php echo $no_rekening; ?>"/>
            <?php if ($error_no_rekening) { ?>
            <span class="error"><?php echo $error_no_rekening; ?></span>
            <?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_pemilik; ?></b></td>
            <td>
            <input type="text" name="pemilik" size="30" class="tableLogin" value="<?php echo $pemilik; ?>"/>
            <?php if ($error_pemilik) { ?>
            <span class="error"><?php echo $error_pemilik; ?></span>
            <?php } ?>
            </td>
          </tr>
        </table>
      </div>
      <div style="padding: 5px; background-color: #eee; font-size: 12pt; font-weight: bold; margin-bottom: 5px; color: black;"><?php echo $text_bayar; ?></div>
      <div class="content">
        <table width="100%">     
          <tr>
            <td width="160"><b><span class="required">*</span> <?php echo $entry_ke_bank; ?></b></td>
            <td>
            <select name="ke_bank" size="1" class="tableLogin">  
				<?php foreach($accounts as $key => $value) { 
					if ($key != 'trf_cod') { ?>
						<option value="<?php echo $value['title'] . ' No. ' . $value['accountno'] . ' a/n. ' . $value['accountname']; ?>">
							<?php echo $value['title'] . ' No. ' . $value['accountno'] . ' a/n. ' . $value['accountname']; ?></option> 
				<?php
						}	
					} ?>
			</select> 
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_jumlah; ?></b></td>
            <td>
            <input type="text" name="jumlah" size="30" class="tableLogin" value="<?php echo $jumlah; ?>"/>
            <?php if ($error_jumlah) { ?>
            <span class="error"><?php echo $error_jumlah; ?></span>
            <?php } ?>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_tanggal; ?></b></td>
            <td>
            <input type="text" name="tanggal" size="30" class="tableLogin tanggal" value="<?php echo $tanggal; ?>"/>
            <?php if ($error_tanggal) { ?>
            <span class="error"><?php echo $error_tanggal; ?></span>
            <?php } ?>
            <script type="text/javascript">
            <!--
            $('.tanggal').datepicker({dateFormat: 'dd/mm/yy'});
            --></script>
            </td>
          </tr>          
          <tr>
            <td><b><?php echo $entry_berita; ?></b></td>
            <td>
              <textarea name="berita" style="width: 99%;" class="tableLogin" rows="5"><?php echo $berita; ?></textarea>
            </td>
          </tr>
          <tr>
            <td><b><span class="required">*</span> <?php echo $entry_captcha; ?></b></td>
	    <td><img src="index.php?route=information/contact/captcha" /><br /><input type="text" name="captcha" class="tableLogin" value="<?php echo $captcha; ?>" autocomplete="off" />
              <?php if ($error_captcha) { ?>
              <span class="error"><?php echo $error_captcha; ?></span>
              <?php } ?>
	   </td>
          </tr>         
        </table>
      </div>
      <div class="buttons">
        <table>
          <tr>
            <td align="right"><a onclick="$('#pembayaran').submit();" class="button"><span><?php echo $button_continue; ?></span></a></td>
          </tr>
        </table>    
        
      </div>
    </form>
    
  <?php } else { ?>
  <div class="content"><?php echo $text_message; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><span><?php echo $button_continue; ?></span></a></div>
  </div>
  <?php } ?>

  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
