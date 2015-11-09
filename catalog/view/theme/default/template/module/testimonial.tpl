<div class="box">
  <div class="box-heading"><?php echo $testimonial_title; ?></div>
  <div class="box-content">
    <div class="box-product">

    <table cellpadding="2" cellspacing="0" style="width: 100%;">

      <?php foreach ($testimonials as $testimonial) { ?>
      <tr><td align="left">

          <i><?php echo $testimonial['description']; ?></i>
          <div width="100%" style="text-align:left; font-size:10px; margin-bottom:12px; padding-bottom:4px;border-bottom:dotted silver 1px;"><b>&bull;&nbsp;<?php echo $testimonial['title']; ?></b>
<div align="right"><a style="color: olive;" href="<?php echo $more.$testimonial['id']; ?>"><?php echo $text_more ; ?></a></div>
</div>

       </td>
      </tr>

      <?php } ?>

<tr><td>
	<div width="100%" align="center" style="margin-top:5px;margin-left:8px;"><a href="<?php echo $isitesti; ?>"><?php echo $isi_testimonial; ?></a>  </div>

</td></tr>
    </table>

	

    </div>
  </div>
</div>

