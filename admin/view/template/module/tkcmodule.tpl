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
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-home">Home Banner</a><a href="#tab-footer">Footer Banner</a><a href="#tab-contact">Contact</a></div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <div id="tab-home">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_enable_home; ?></td>
            <td><select name="tkcmodule_enable_home">
                <?php foreach ($enables as $enable) { ?>
                <?php if ($enable['id'] == $tkcmodule_enable_home) { ?>
                <option value="<?php echo $enable['id']; ?>" selected="selected"><?php echo $enable['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $enable['id']; ?>"><?php echo $enable['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_big_banner; ?></td>
            <td><select name="tkcmodule_big_banner">
                <?php foreach ($banners as $banner) { ?>
                <?php if ($banner['banner_id'] == $tkcmodule_big_banner) { ?>
                <option value="<?php echo $banner['banner_id']; ?>" selected="selected"><?php echo $banner['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $banner['banner_id']; ?>"><?php echo $banner['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_small_banner; ?></td>
            <td><select name="tkcmodule_small_banner">
                <?php foreach ($banners as $banner) { ?>
                <?php if ($banner['banner_id'] == $tkcmodule_small_banner) { ?>
                <option value="<?php echo $banner['banner_id']; ?>" selected="selected"><?php echo $banner['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $banner['banner_id']; ?>"><?php echo $banner['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_banner_layout; ?></td>
            <td><?php foreach ($banner_layouts as $layout) { ?>
                <?php if ($layout['layout_id'] == $tkcmodule_banner_layout) { ?>
                <input type="radio" name="tkcmodule_banner_layout" value="<?php echo $layout['layout_id']; ?>" checked="checked"> <?php echo $layout['name']; ?><br />
                <?php } else { ?>
                <input type="radio" name="tkcmodule_banner_layout" value="<?php echo $layout['layout_id']; ?>"> <?php echo $layout['name']; ?><br />
                <?php } ?>
                <img src="../image/tkcmodule/layout<?php echo $layout['layout_id']; ?>.jpg"><br />
                <?php } ?>
            </td>
          </tr>
          <tr>
            <td>Pengembang:</td>
            <td>Toko Online</td>
          </tr>
        </table>
      </div>
      <div id="tab-footer">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_enable_footer; ?></td>
            <td><select name="tkcmodule_enable_footer">
                <?php foreach ($enables as $enable) { ?>
                <?php if ($enable['id'] == $tkcmodule_enable_footer) { ?>
                <option value="<?php echo $enable['id']; ?>" selected="selected"><?php echo $enable['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $enable['id']; ?>"><?php echo $enable['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_footer_banner; ?></td>
            <td><select name="tkcmodule_footer_banner">
                <?php foreach ($banners as $banner) { ?>
                <?php if ($banner['banner_id'] == $tkcmodule_footer_banner) { ?>
                <option value="<?php echo $banner['banner_id']; ?>" selected="selected"><?php echo $banner['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $banner['banner_id']; ?>"><?php echo $banner['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td>Pengembang:</td>
            <td>Toko Online</td>
          </tr>
        </table>
      </div>
      <div id="tab-contact">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_pinbb; ?></td>
            <td><input type="text" name="tkcmodule_pinbb" value="<?php echo $tkcmodule_pinbb; ?>"></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_facebook; ?></td>
            <td><input type="text" name="tkcmodule_facebook" value="<?php echo $tkcmodule_facebook; ?>" size="100"></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_twitter; ?></td>
            <td><input type="text" name="tkcmodule_twitter" value="<?php echo $tkcmodule_twitter; ?>" size="100"></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_googleplus; ?></td>
            <td><input type="text" name="tkcmodule_googleplus" value="<?php echo $tkcmodule_googleplus; ?>" size="100"></td>
          </tr>
          <tr>
            <td><span class="required">*</span> <?php echo $entry_rss; ?></td>
            <td><input type="text" name="tkcmodule_rss" value="<?php echo $tkcmodule_rss; ?>" size="100"></td>
          </tr>
          <tr>
            <td>Pengembang:</td>
            <td>Toko Online</td>
          </tr>
        </table>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script>
<?php echo $footer; ?>
