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
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<div class="box">
  <div class="heading">
      <h1><img src="view/image/country.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="location = '<?php echo $insert; ?>'" class="button"><?php echo $button_insert; ?></a><a onclick="$('form').attr('action', '<?php echo $delete; ?>'); $('form').submit();" class="button"><?php echo $button_delete; ?></a></div>
  </div>
  <div class="content">
    <form action="" method="post" enctype="multipart/form-data" id="form">
      <table class="list">
        <thead>
          <tr>
            <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
            <td class="left"><?php if ($sort == 'city_zone') { ?>
              <a href="<?php echo $sort_zone; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_zone; ?></a>
              <?php } else { ?>
              <a href="<?php echo $sort_zone; ?>"><?php echo $column_zone; ?></a>
              <?php } ?></td>
            <td class="left"><?php if ($sort == 'city_name') { ?>
              <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
              <?php } else { ?>
              <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
              <?php } ?></td>
            <td class="left"><?php if ($sort == 'city_code') { ?>
              <a href="<?php echo $sort_code; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_code; ?></a>
              <?php } else { ?>
              <a href="<?php echo $sort_code; ?>"><?php echo $column_code; ?></a>
              <?php } ?></td>              
            <td class="left"><?php if ($sort == 'city_country') { ?>
              <a href="<?php echo $sort_country; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_country; ?></a>
              <?php } else { ?>
              <a href="<?php echo $sort_country; ?>"><?php echo $column_country; ?></a>
              <?php } ?></td>
            <td class="left"><?php if ($sort == 'city_status') { ?>
              <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
              <?php } else { ?>
              <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
              <?php } ?></td>              
            <td class="right"><?php echo $column_jnereg; ?></td>              
            <td class="right"><?php echo $column_jneoke; ?></td>              
            <td class="right"><?php echo $column_jneyes; ?></td>
            <td class="right"><?php echo $column_tikireg; ?></td>
            <td class="right"><?php echo $column_tikions; ?></td>
            <td class="right"><?php echo $column_kgp; ?></td>
            <td class="right"><?php echo $column_action; ?></td>
          </tr>
        </thead>
        <tbody>
          <tr class="filter">
            <td></td>
            <td><input type="text" name="filter_zone" value="<?php echo $filter_zone; ?>" /></td>
            <td><input type="text" name="filter_city" value="<?php echo $filter_city; ?>" /></td>
	    <td><input type="text" name="filter_code" value="<?php echo $filter_code; ?>" /></td>
            <td><select name="filter_country_id">
                <option value="*"></option>
                <?php foreach ($countries as $country) { ?>
                <?php if ($country['country_id'] == $filter_country_id) { ?>
                <option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
            <td><select name="filter_status">
                <option value="*"></option>
                <?php if ($filter_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <?php } ?>
                <?php if (!is_null($filter_status) && !$filter_status) { ?>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
            <td align="right" nowrap><div class="buttons"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a>&nbsp;&nbsp;&nbsp;<a onclick="location = '<?php echo $reset; ?>'" class="button">X</a></div></td>
          </tr>
          <?php if ($cities) { ?>
          <?php foreach ($cities as $city) { ?>
          <tr>
            <td style="text-align: center;"><?php if ($city['selected']) { ?>
              <input type="checkbox" name="selected[]" value="<?php echo $city['city_id']; ?>" checked="checked" />
              <?php } else { ?>
              <input type="checkbox" name="selected[]" value="<?php echo $city['city_id']; ?>" />
              <?php } ?></td>
            <td class="left"><?php echo $city['zone']; ?></td>
            <td class="left"><?php echo $city['name']; ?></td>
            <td class="left"><?php echo $city['code']; ?></td>
            <td class="left"><?php echo $city['country']; ?></td>
            <td class="left"><?php echo $city['status']; ?></td>
            <td class="left"><?php echo $city['jnereg']; ?></td>
            <td class="left"><?php echo $city['jneoke']; ?></td>
            <td class="left"><?php echo $city['jneyes']; ?></td>
            <td class="left"><?php echo $city['tikireg']; ?></td>
            <td class="left"><?php echo $city['tikions']; ?></td>
            <td class="left"><?php echo $city['kgp']; ?></td>
            <td class="right"><?php foreach ($city['action'] as $action) { ?>
              [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
              <?php } ?></td>
          </tr>
          <?php } ?>
          <?php } else { ?>
          <tr>
            <td class="center" colspan="8"><?php echo $text_no_results; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </form>
    <div class="pagination"><?php echo $pagination; ?></div>
  </div>
</div>
</div>
<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=localisation/city&token=<?php echo $token; ?>';
	
	var filter_zone = $('input[name=\'filter_zone\']').attr('value');
	
	if (filter_zone) {
		url += '&filter_zone=' + encodeURIComponent(filter_zone);
	}
	
	var filter_city = $('input[name=\'filter_city\']').attr('value');
	
	if (filter_city) {
		url += '&filter_city=' + encodeURIComponent(filter_city);
	}

	var filter_code = $('input[name=\'filter_code\']').attr('value');
	
	if (filter_code) {
		url += '&filter_code=' + encodeURIComponent(filter_code);
	}
	
	var filter_country_id = $('select[name=\'filter_country_id\']').attr('value');
	
	if (filter_country_id != '*') {
		url += '&filter_country_id=' + encodeURIComponent(filter_country_id);
	}	
	
	var filter_status = $('select[name=\'filter_status\']').attr('value');
	
	if (filter_status != '*') {
		url += '&filter_status=' + encodeURIComponent(filter_status); 
	}	
		
	location = url;
}
//--></script>
<?php echo $footer; ?>
