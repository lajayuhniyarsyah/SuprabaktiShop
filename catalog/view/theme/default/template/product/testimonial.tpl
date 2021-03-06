<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>

    <?php if ($testimonials) { ?>
    
      <?php foreach ($testimonials as $testimonial) { ?>
      <table class="content" width="100%">
      <tr>
         <td valign="top" style="text-align:left;" colspan="2"><b><?php echo $testimonial['title']; ?></b></td>
      </tr>
      <tr>
      	<td style="font-size: 0.9em; text-align: left;"><?php echo $testimonial['auteur']; ?></td>
		<td style="font-size: 0.9em; text-align: right;">
                <?php if ($testimonial['rating']) { ?>
                <?php echo $text_average; ?>
                  <img src="catalog/view/theme/default/image/stars-<?php echo $testimonial['rating'] . '.png'; ?>" alt="<?php echo $text_stars; ?>" style="margin-top: 2px;" />
                  <?php } ?>
                  </td>
        </td>

      </tr>
      <tr>
      	<td colspan="2" style="text-align:left;">
         <?php echo $testimonial['description']; ?>
         </td>
      </tr>    </table>
      <?php } ?>

    	<?php if ( isset($pagination)) { ?>
    		<div class="pagination"><?php echo $pagination;?></div>
    		<div class="buttons" align="right"><a class="button" href="<?php echo $write_url;?>" title="<?php echo $write;?>"><span><?php echo $write;?></span></a></div>
    	<?php }?>
    	<?php if (isset($showall_url)) { ?>
    		<div class="buttons" align="right"><a class="button" href="<?php echo $write_url;?>" title="<?php echo $write;?>"><span><?php echo $write;?></span></a> &nbsp;<a class="button" href="<?php echo $showall_url;?>" title="<?php echo $showall;?>"><span><?php echo $showall;?></span></a></div>
    	<?php }?>
    <?php } ?>

  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
