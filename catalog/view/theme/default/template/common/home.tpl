<?php echo $header; ?>

<?php if ($tkcmodule_enable_home) { ?>

<div class="slideshow" style="<?php echo $tkcmodule_style; ?>">

  <div style="<?php echo $tkcmodule_banner1_style; ?>">
    <?php if ($banner1['link']) { ?>
    <a href="<?php echo $banner1['link']; ?>"><img src="<?php echo $banner1['image']; ?>" alt="<?php echo $banner1['title']; ?>" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner1['image']; ?>" alt="<?php echo $banner1['title']; ?>" />
    <?php } ?>
  </div>

  <div style="<?php echo $tkcmodule_banner2_style; ?>">
    <?php if ($banner2['link']) { ?>
    <a href="<?php echo $banner2['link']; ?>"><img src="<?php echo $banner2['image']; ?>" alt="<?php echo $banner2['title']; ?>" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner2['image']; ?>" alt="<?php echo $banner2['title']; ?>" />
    <?php } ?>
  </div>

  <div style="<?php echo $tkcmodule_banner3_style; ?>">
    <?php if ($banner3['link']) { ?>
    <a href="<?php echo $banner3['link']; ?>"><img src="<?php echo $banner3['image']; ?>" alt="<?php echo $banner3['title']; ?>" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner3['image']; ?>" alt="<?php echo $banner3['title']; ?>" />
    <?php } ?>
  </div>

  <div style="<?php echo $tkcmodule_banner4_style; ?>">
    <?php if ($banner4['link']) { ?>
    <a href="<?php echo $banner4['link']; ?>"><img src="<?php echo $banner4['image']; ?>" alt="<?php echo $banner4['title']; ?>" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner4['image']; ?>" alt="<?php echo $banner4['title']; ?>" />
    <?php } ?>
  </div>

  <div id="tkcmodule" class="nivoSlider" style="<?php echo $tkcmodule_banner0_style; ?>">
    <?php foreach ($banner0 as $banner) { ?>
    <?php if ($banner['link']) { ?>
    <a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" />
    <?php } ?>
    <?php } ?>
  </div>

</div>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('#tkcmodule').nivoSlider();
});
--></script>

<?php } ?>

<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
<h1 style="display: none;"><?php echo $heading_title; ?></h1>
<?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
