<div class="menu-section menuSection">
  <div class="content">
    <h2 class="menu-section-toggle menuSectionToggle">
      <span class='about-toggle aboutToggle'>
        <?php the_field('about_headline', 'options');?>
      </span>
      /
      <span class='nominate-toggle nominateToggle'>
        <?php the_field('nominate_headline', 'options');?>
      </span>
    </h2>
    <div class="sub-menu-area about-area aboutArea">
      <?php the_field('about_body', 'options');?>
      <div class="about-email-button-area aboutEmailButtonArea">
        <div class="about-email-button aboutEmailButton">
          <a class="c-block-fill" href="<?php the_field('about_btn_link', 'options');?>"></a>
          <?php the_field('about_btn_text', 'options');?>
        </div>
      </div>

      <div class="about-links">
        <h2>Helpful Links</h2>
        <?php if( have_rows('about_links', 'options') ):?>
          <ul class="link-list">
          <?php while ( have_rows('about_links', 'options') ) : the_row();?>
            <li class="about-single-link aboutSingleLink">
              <?php the_sub_field('single_link_text');?>
              <a class="c-block-fill" href="<?php the_sub_field('single_link_destination');?>"></a>
            </li>
          <?php endwhile;?>
          </ul>
        <?php endif;?>
      </div>
    </div>

    <div class="sub-menu-area nominate-form nominateForm">
      <?php the_field('nominate_body', 'options');?>
      <?php echo do_shortcode('[contact-form-7 id="63" title="Nominate Form"]');?>
    </div>
  </div>
</div>
