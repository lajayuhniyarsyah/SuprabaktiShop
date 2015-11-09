<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="heading">
      <h1><img src="view/image/country.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
  </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">

	<tr>
          <td><span class="required">*</span> <?php echo $entry_country; ?></td>
          <td><select name="country_id" id="country_id" onchange="$('select[name=\'zone_id\']').load('index.php?route=localisation/city/zone&token=<?php echo $token; ?>&country_id=' + this.value);">
              <option value=""><?php echo $text_select; ?></option>
	      <?php foreach ($countries as $country) { ?>
              <?php if ($country['country_id'] == $country_id) { ?>
              <option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
	    <?php if ($error_country) { ?>
            <span class="error"><?php echo $error_country; ?></span>
            <?php } ?></td>
        </tr>
	<tr>
          <td><span class="required">*</span> <?php echo $entry_zone; ?></td>
          <td><select name="zone_id" id="zone_id">
            </select>
	    <?php if ($error_zone) { ?>
            <span class="error"><?php echo $error_zone; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_name; ?></td>
          <td><input type="text" name="name" value="<?php echo $name; ?>" />
            <?php if ($error_name) { ?>
            <span class="error"><?php echo $error_name; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><?php echo $entry_code; ?></td>
          <td><input type="text" name="code" value="<?php echo $code; ?>" /></td>
        </tr>
	<tr>
          <td><?php echo $entry_status; ?></td>
          <td><select name="status">
              <?php if ($status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_jnereg; ?></td>
          <td><input type="text" name="jnereg" value="<?php echo $jnereg; ?>" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_jneoke; ?></td>
          <td><input type="text" name="jneoke" value="<?php echo $jneoke; ?>" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_jneyes; ?></td>
          <td><input type="text" name="jneyes" value="<?php echo $jneyes; ?>" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_tikireg; ?></td>
          <td><input type="text" name="tikireg" value="<?php echo $tikireg; ?>" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_tikions; ?></td>
          <td><input type="text" name="tikions" value="<?php echo $tikions; ?>" /></td>
        </tr>
        <tr>
          <td><?php echo $entry_kgp; ?></td>
          <td><input type="text" name="kgp" value="<?php echo $kgp; ?>" /></td>
        </tr>
      </table>
      <script type="text/javascript"><!--
		  $('select[name=\'zone_id\']').load('index.php?route=localisation/city/zone&token=<?php echo $token; ?>&country_id=<?php echo $country_id; ?>&zone_id=<?php echo $zone_id; ?>');
		  //--></script> 
    </form>
  </div>
</div>
</div>
<?php echo $footer; ?>
