<?php /* Template Name: Home */ ?>
    <!-- Banner Section -->
     <?php get_header(); ?>
    <section class="banner-section">
        <div class="banner-carousel owl-carousel owl-theme">
            <?php 
            $slider_rows = get_field('slider_section');
            
            if($slider_rows && is_array($slider_rows)): 
                foreach($slider_rows as $row): 
                    $image = $row['image']['url']; // Fix: Access the URL from image array
                    $title = $row['title'];
                    $description = $row['description'];
                    $button = $row['button'];
            ?>
                    <div class="slide-item" style="background-image: url(<?php echo esc_url($image); ?>);">
                        <div class="auto-container">
                            <div class="content-box">
                                <h2><?php echo wp_kses_post($title); ?></h2>
                                <div class="text"><?php echo esc_html($description); ?></div>
                                <?php if($button): ?>
                                    <div class="link-box">
                                        <a href="<?php echo esc_url($button['url']); ?>" class="theme-btn btn-style-one"><?php echo esc_html($button['title']); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php 
                endforeach; 
            endif; 
            ?>
        </div>

        <?php 
        // Get CTA section data from ACF
        $cta_section = get_field('cta_section');
        if($cta_section): 
        ?>
        <div class="bottom-box">
            <div class="auto-container clearfix">
                <ul class="contact-info">
                    <?php if($cta_section['phone_number']): ?>
                    <li><span>Phone :</span> <a href="tel:<?php echo esc_attr($cta_section['phone_number']); ?>"><?php echo esc_html($cta_section['phone_number']); ?></a></li>
                    <?php endif; ?>
                    
                    <?php if($cta_section['email']): ?>
                    <li><span>EMAIL :</span> <a href="mailto:<?php echo esc_attr($cta_section['email']); ?>"><?php echo esc_html($cta_section['email']); ?></a></li>
                    <?php endif; ?>
                </ul> 
            </div>
        </div>
        <?php endif; ?>
    </section>
    <!-- End Banner Section -->

    <?php 
    // Get About Us section data from ACF
    $about_us_section = get_field('about_us_section');
    if($about_us_section): 
    ?>
    <!-- About Section -->
    <section class="about-section" style="background-image: url(<?php echo esc_url($about_us_section['bg_image']['url']); ?>);">
        <div class="auto-container">
            <div class="row no-gutters">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                            <h2><?php echo wp_kses_post($about_us_section['section_title']); ?></h2>
                        </div>
                        <div class="image-box">
                            <?php if($about_us_section['first_image']): ?>
                            <figure class="alphabet-img wow fadeInRight"><img src="<?php echo esc_url($about_us_section['first_image']['url']); ?>" alt="<?php echo esc_attr($about_us_section['first_image']['alt']); ?>"></figure>
                            <?php endif; ?>
                            
                            <?php if($about_us_section['secound_image']): ?>
                            <figure class="image wow fadeInRight" data-wow-delay='600ms'><img src="<?php echo esc_url($about_us_section['secound_image']['url']); ?>" alt="<?php echo esc_attr($about_us_section['secound_image']['alt']); ?>"></figure>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="content-box">
                            <?php if($about_us_section['title']): ?>
                            <div class="title">
                                <h2><?php echo wp_kses_post($about_us_section['title']); ?></h2>
                            </div>
                            <?php endif; ?>
                            
                            <?php if($about_us_section['description']): ?>
                            <div class="text"><?php echo wp_kses_post($about_us_section['description']); ?></div>
                            <?php endif; ?>
                            
                            <?php if($about_us_section['button']): ?>
                            <div class="link-box">
                                <a href="<?php echo esc_url($about_us_section['button']['url']); ?>" class="theme-btn btn-style-one"><?php echo esc_html($about_us_section['button']['title']); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!--End About Section -->

    <?php 
    // Get Specialization section data from ACF
    $specialization_section = get_field('specialization_section');
    if($specialization_section): 
    ?>
    <!-- Services Section -->
    <section class="services-section">
        <div class="upper-box" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/background/2.jpg);">
            <div class="auto-container">    
                <div class="sec-title text-center light">
                    <?php if($specialization_section['float_tittle_']): ?>
                    <span class="float-text"><?php echo esc_html($specialization_section['float_tittle_']); ?></span>
                    <?php endif; ?>
                    
                    <?php if($specialization_section['section_title']): ?>
                    <h2><?php echo wp_kses_post($specialization_section['section_title']); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if($specialization_section['specializations'] && is_array($specialization_section['specializations'])): ?>
        <div class="services-box">
            <div class="auto-container">
                <div class="services-carousel owl-carousel owl-theme">
                    <?php foreach($specialization_section['specializations'] as $specialization): ?>
                    <!-- Service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <?php if($specialization['image']): ?>
                                <figure class="image">
                                    <?php if($specialization['button']): ?>
                                    <a href="<?php echo esc_url($specialization['button']['url']); ?>">
                                        <img src="<?php echo esc_url($specialization['image']['url']); ?>" alt="<?php echo esc_attr($specialization['image']['alt']); ?>">
                                    </a>
                                    <?php else: ?>
                                    <img src="<?php echo esc_url($specialization['image']['url']); ?>" alt="<?php echo esc_attr($specialization['image']['alt']); ?>">
                                    <?php endif; ?>
                                </figure>
                                <?php endif; ?>
                            </div>
                            <div class="lower-content">
                                <?php if($specialization['title']): ?>
                                <h3>
                                    <?php if($specialization['button']): ?>
                                    <a href="<?php echo esc_url($specialization['button']['url']); ?>"><?php echo esc_html($specialization['title']); ?></a>
                                    <?php else: ?>
                                    <?php echo esc_html($specialization['title']); ?>
                                    <?php endif; ?>
                                </h3>
                                <?php endif; ?>
                                
                                <?php if($specialization['description']): ?>
                                <div class="text"><?php echo wp_kses_post($specialization['description']); ?></div>
                                <?php endif; ?>
                                
                                <?php if($specialization['button']): ?>
                                <div class="link-box">
                                    <a href="<?php echo esc_url($specialization['button']['url']); ?>"><?php echo esc_html($specialization['button']['title']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>
    <!--End Services Section -->

    <?php 
    // Get Counter section data from ACF
    $counter_section = get_field('counter_secction');
    if($counter_section): 
    ?>
    <!-- Fun Fact Section -->
    <section class="fun-fact-section">
        <div class="outer-box" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/background/3.jpg);">
            <div class="auto-container">
                <div class="fact-counter">
                    <div class="row">
                        <?php if($counter_section['counter_one']): ?>
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo esc_attr($counter_section['counter_one']['counter_number']); ?>">0</span></div>
                                <h4 class="counter-title"><?php echo wp_kses_post($counter_section['counter_one']['counter_text']); ?></h4>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($counter_section['counter_two']): ?>
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo esc_attr($counter_section['counter_two']['counter_number']); ?>">0</span></div>
                                <h4 class="counter-title"><?php echo wp_kses_post($counter_section['counter_two']['counter_text']); ?></h4>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($counter_section['counter_three']): ?>
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo esc_attr($counter_section['counter_three']['counter_number']); ?>">0</span></div>
                                <h4 class="counter-title"><?php echo wp_kses_post($counter_section['counter_three']['counter_text']); ?></h4>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($counter_section['counter_four']): ?>
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="<?php echo esc_attr($counter_section['counter_four']['counter_number']); ?>">0</span></div>
                                <h4 class="counter-title"><?php echo wp_kses_post($counter_section['counter_four']['counter_text']); ?></h4>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!--End Fun Fact Section -->

    <!-- Project Section -->
    <section class="projects-section">
        <div class="auto-container">
            <div class="sec-title text-right">
                <span class="float-text">Project</span>
                <h2>Our Project</h2>
            </div>
        </div>
        
        <div class="inner-container">
            <div class="projects-carousel owl-carousel owl-theme">
                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/1.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/2.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/2.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/3.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/3.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/4.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/4.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/5.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/5.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>

                <!-- Project Block -->
                <div class="project-block">
                    <div class="image-box">
                        <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/3.jpg" alt=""></figure>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">Laxury Home <br>Project</a></h4>
                            <div class="btn-box">
                                <a href="<?php echo get_template_directory_uri(); ?>/assets/images/gallery/3.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href="project-detail.html"><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">Architecture</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Project Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="title">Our Team</span>
                <h2>Profect Expert</h2>
            </div>

            <div class="row clearfix">
                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="image"><a href="team.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/team-1.jpg" alt=""></a></div>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                            <h3 class="name"><a href="team.html">Scott Grey</a></h3>
                        </div>
                        <span class="designation">Architect</span>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="image"><a href="team.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/team-2.jpg" alt=""></a></div>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                            <h3 class="name"><a href="team.html">Russel Reed</a></h3>
                        </div>
                        <span class="designation">Project Manager</span>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="image"><a href="team.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/team-3.jpg" alt=""></a></div>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                            <h3 class="name"><a href="team.html">Cheryl Ray</a></h3>
                        </div>
                        <span class="designation">Interior Designer</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Team Section -->

    <?php 
    // Get Testimonials section data from ACF
    $testimonials_section = get_field('testimonials_section');
    if($testimonials_section): 
    ?>
    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="outer-container clearfix">
            <!-- Title Column -->
            <div class="title-column clearfix">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="float-text">testimonial</span>
                        <?php if($testimonials_section['section_title_']): ?>
                        <h2><?php echo wp_kses_post($testimonials_section['section_title_']); ?></h2>
                        <?php endif; ?>
                        
                        <?php if($testimonials_section['description']): ?>
                        <div class="text"><?php echo wp_kses_post($testimonials_section['description']); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Testimonial Column -->
            <div class="testimonial-column clearfix" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/background/4.jpg);">
                <div class="inner-column">
                    <?php if($testimonials_section['testimonials_slider'] && is_array($testimonials_section['testimonials_slider'])): ?>
                    <div class="testimonial-carousel owl-carousel owl-theme">
                        <?php foreach($testimonials_section['testimonials_slider'] as $testimonial): ?>
                        <!-- Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <?php if($testimonial['image']): ?>
                                <div class="image-box"><img src="<?php echo esc_url($testimonial['image']['url']); ?>" alt="<?php echo esc_attr($testimonial['image']['alt']); ?>"></div>
                                <?php endif; ?>
                                
                                <?php if($testimonial['description']): ?>
                                <div class="text"><?php echo wp_kses_post($testimonial['description']); ?></div>
                                <?php endif; ?>
                                
                                <div class="info-box">
                                    <?php if($testimonial['title']): ?>
                                    <h4 class="name"><?php echo esc_html($testimonial['title']); ?></h4>
                                    <?php endif; ?>
                                    
                                    <?php if($testimonial['possition']): ?>
                                    <span class="designation"><?php echo esc_html($testimonial['possition']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!--End Testimonial Section -->

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Blogs</span>
                <h2>News & Articals</h2>
            </div>
            <div class="row">
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/news-1.jpg" alt=""></figure>
                            <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <h3><a href="blog-detail.html">In Good Taste: Mark Finlay Architects & Interiors.</a></h3>
                            <ul class="info">
                                <li>06 June 2018,</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/news-2.jpg" alt=""></figure>
                            <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <h3><a href="blog-detail.html">The Lexury Apartment of sepcial interiors.</a></h3>
                            <ul class="info">
                                <li>06 June 2018,</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/news-3.jpg" alt=""></figure>
                            <div class="overlay-box"><a href="blog-detail.html"><i class="fa fa-link"></i></a></div>
                        </div>
                        <div class="caption-box">
                            <h3><a href="blog-detail.html">The Business metting room interior in the rank.</a></h3>
                            <ul class="info">
                                <li>06 June 2018,</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End News Section -->

    <?php 
    // Get Client section data from ACF
    $client_section = get_field('client_section');
    if($client_section && is_array($client_section)): 
    ?>
    <!--Clients Section-->
    <section class="clients-section">
        <div class="inner-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <?php foreach($client_section as $client): ?>
                    <li class="slide-item">
                        <figure class="image-box">
                            <?php if($client['logo']): ?>
                                <?php if($client['logo_link'] && is_array($client['logo_link']) && !empty($client['logo_link']['url'])): ?>
                                <a href="<?php echo esc_url($client['logo_link']['url']); ?>">
                                    <img src="<?php echo esc_url($client['logo']['url']); ?>" alt="<?php echo esc_attr($client['logo']['alt']); ?>">
                                </a>
                                <?php else: ?>
                                <img src="<?php echo esc_url($client['logo']['url']); ?>" alt="<?php echo esc_attr($client['logo']['alt']); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </figure>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!--End Clients Section-->
    <?php get_footer(); ?>