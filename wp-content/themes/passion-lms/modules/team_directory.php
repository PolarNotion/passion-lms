<?php
  $title = get_sub_field('title');
?>

<section>
  <div class="container pad">
    <h2><?php echo $title; ?></h3>
    <?php if (get_sub_field('teams')): ?>
      <div class="row">
        <?php while(the_repeater_field('teams')):
          $team_name  = get_sub_field('team_name');
          $image      = get_sub_field('image');
          $team_page  = get_sub_field('team_page');
        ?>
          <div class="col-sm-3">
            <a href="<?php echo $team_page; ?>">
              <div class="fixedratio" style="background-image: url(<?php echo $image; ?>)"></div>
              <h3><?php echo $team_name; ?></h3>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
