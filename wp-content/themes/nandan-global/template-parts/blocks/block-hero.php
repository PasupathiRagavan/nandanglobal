<?php 
    $title = get_field("ng_hero_title");
    $description = get_field("ng_hero_description");
?>
<section class="hero py-16">
    <div class="container">
        <div class="">
            <?php if(!empty($title)) :?>
                <h1 class="text-gray-900 font-bold mb-5 text-2xl">
                    <?php echo $title; ?>
                </h1>
            <?php endif; ?>
            <?php if(!empty($title)) :?>
                <div class="description">
                    <?php echo $description; ?>
                </div> 
            <?php endif; ?>
        </div>
    </div>
</section>