
<section class="list-item pt-16">
    <div class="container">
        <div class="">
            <!-- Line -->
           
            <ul class="">
                <div class="vertical-line"></div>
                <div class="line h-3 ml-[.35rem] mb-10 bg-yellow-300"></div>
                 
                <?php

                    // Check rows exists.
                    if( have_rows('ng_list_item_repeater') ):

                        // Loop through rows.
                        while( have_rows('ng_list_item_repeater') ) : the_row();

                            // Load sub field value.
                            $title = get_sub_field('ng_list_item_r_title');
                            $description = get_sub_field('ng_list_item_r_description');
                            $image = get_sub_field('ng_list_item_r_image');
                            $CTA = get_sub_field('ng_list_item_r_cta');  ?>
                            <li class="">
                                <div class="grid lg:grid-cols-6 gap-6 border-t border-t-gray-200 py-10">
                                    <?php if(!empty($image)): ?>
                                        <div class="col-span-2">
                                            <img class="shadow-lg " src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>">
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-span-4">
                                        <?php if(!empty($title)): ?>
                                            <h5 class="text-gray-900 font-semibold mb-3 text-lg">
                                                <?php echo $title; ?>
                                            </h5>
                                        <?php endif; ?>
                                        <?php if(!empty($description)): ?>
                                            <div class="description mb-3">
                                                <?php echo $description; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($CTA)): ?>
                                            <div class="flex justify-end">
                                                <a class="bg-yellow-300 inline-flex items-center text-gray-900 text-sm px-3 py-2  hover:bg-yellow-500 " target="<?php echo $CTA['target'] ?>" href="<?php echo $CTA['url'] ?>">
                                                    <span class="pr-1"><?php echo $CTA['title'] ?></span>
                                                    <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7.293 4.707 14.586 12l-7.293 7.293 1.414 1.414L17.414 12 8.707 3.293 7.293 4.707z"/></svg>
                                                </a>
                                                
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>

                        <?php // End loop.
                        endwhile;
                    endif; 
                ?>
            </ul>
        </div>
    </div>
</section>