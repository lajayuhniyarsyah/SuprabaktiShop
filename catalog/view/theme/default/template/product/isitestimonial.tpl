<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
 	
  	<p><?php echo $text_conditions ?></p>
  
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="testimonial">
	<div class="content">
        <table width="100%">
          <tr>
            <td><?php echo $entry_title ?><br />
              <input type="text" name="title" value="<?php echo $title; ?>" size = 90 />
              <?php if ($error_title) { ?>
              <span class="error"><?php echo $error_title; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_enquiry ?><span class="required">*</span><br />
              <textarea name="description" style="width: 99%;" rows="10"><?php echo $description; ?></textarea><br />

              <?php if ($error_enquiry) { ?>
              <span class="error"><?php echo $error_enquiry; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_name ?><br />
              <input type="text" name="name" value="<?php echo $name; ?>" />
              <?php if ($error_name) { ?>
              <span class="error"><?php echo $error_name; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><?php echo $entry_city ?><br />
              <input type="text" name="city" value="<?php echo $city; ?>" />
			</td>
          </tr>
          <tr>
            <td>
              <input type="hidden" name="email" value="<?php echo $email; ?>" />
              <?php if ($error_email) { ?>
              <span class="error"><?php echo $error_email; ?></span>
              <?php } ?></td>
          </tr>
          <tr>
            <td><br><b><?php echo $entry_rating; ?></b>   &nbsp;&nbsp;&nbsp; <span><?php echo $entry_bad; ?></span>&nbsp;
        		<input type="radio" name="rating" value="1" style="margin: 0;" <?php if ( $rating == 1 ) echo 'checked="checked"';?> />
        		&nbsp;
        		<input type="radio" name="rating" value="2" style="margin: 0;" <?php if ( $rating == 2 ) echo 'checked="checked"';?> />
        		&nbsp;
        		<input type="radio" name="rating" value="3" style="margin: 0;" <?php echo 'checked="checked"';?> />
        		&nbsp;
        		<input type="radio" name="rating" value="4" style="margin: 0;" <?php if ( $rating == 4 ) echo 'checked="checked"';?> />
        		&nbsp;
        		<input type="radio" name="rating" value="5" style="margin: 0;" <?php if ( $rating == 5 ) echo 'checked="checked"';?> />
        		&nbsp; <span><?php echo $entry_good; ?></span><br /><br>

          	</td>
          </tr>
          <tr>
            <td><?php echo $entry_captcha; ?><span class="required">*</span> <br />
              <input type="text" name="captcha" value="<?php echo $captcha; ?>" /><br>
              <?php if ($error_captcha) { ?>
              <span class="error"><?php echo $error_captcha; ?></span>
              <?php } ?>
              <br />
              <img src="index.php?route=information/contact/captcha" /></td>
          </tr>
        </table>
	  </div>
      <div class="buttons">
        <table>
          <tr>
            <td align="right"><a onclick="$('#testimonial').submit();" class="button"><span><?php echo $button_continue; ?></span></a></td>
          </tr>
        </table>
      </div>
    </form>
    
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
