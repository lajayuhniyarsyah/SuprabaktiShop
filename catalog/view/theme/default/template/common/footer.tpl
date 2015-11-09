<?php if ($tkcmodule_enable_footer) { ?>

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

</div>

<?php } ?>

<div id="footer">
  <?php if ($informations) { ?>
  <div class="column">
    <h3><?php echo $text_information; ?></h3>
    <ul>
      <?php foreach ($informations as $information) { ?>
      <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
      <?php } ?>
    </ul>
  </div>
  <?php } ?>
  <div class="column">
    <h3><?php echo $text_service; ?></h3>
    <ul>
      <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
      <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
      <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3><?php echo $text_extra; ?></h3>
    <ul>
      <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
      <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
      <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
      <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
    </ul>
  </div>
  <div class="column">
    <h3><?php echo $text_account; ?></h3>
    <ul>
      <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
      <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
      <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
      <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
    </ul>
  </div>
  <div class="contact">
    <h3>Contact Us</h3>
    <ul>
      <li>Phone: <?php echo $phone; ?></li>
      <li>E-mail: <?php echo $email; ?></li>
      <?php if ($pinbb) { ?>
      <li>Pin BB: <?php echo $pinbb; ?></li>
      <?php } ?>
    </ul>
    <h3>Follow Us</h3>
    <div id="social"><a class="facebookbutton" href="<?php echo $facebook; ?>" title="Facebook">Facebook</a><a class="twitterbutton" href="<?php echo $twitter; ?>" title="Twitter">Twitter</a><a class="googlebutton" href="<?php echo $googleplus; ?>" title="Google+">Google+</a><a class="rssbutton" href="<?php echo $rss; ?>" title="RSS">RSS</a></div>
  </div>
</div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<div id="powered"><?php echo $powered; ?></div>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</div>
</body></html>
