// جدول محصولات و آپشن دسته بندی ها
add_action('product_cat_add_form_fields', 'add_category_show_in_table_field');
add_action('product_cat_edit_form_fields', 'edit_category_show_in_table_field');
add_action('created_product_cat', 'save_category_show_in_table_field');
add_action('edited_product_cat', 'save_category_show_in_table_field');

function add_category_show_in_table_field() {
    ?>
    <div class="form-field">
        <label for="show_in_table">
            <input type="checkbox" name="show_in_table" id="show_in_table" value="1">
            نمایش روی جدول
        </label>
        <p class="description">اگر فعال شود، این دسته در جدول تب‌بندی شده نمایش داده می‌شود.</p>
    </div>
    <?php
}

function edit_category_show_in_table_field($term) {
    $show_in_table = get_term_meta($term->term_id, 'show_in_table', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="show_in_table">نمایش روی جدول</label></th>
        <td>
            <input type="checkbox" name="show_in_table" id="show_in_table" value="1" <?php checked($show_in_table, '1'); ?>>
            <p class="description">اگر فعال شود، این دسته در جدول تب‌بندی شده نمایش داده می‌شود.</p>
        </td>
    </tr>
    <?php
}

function save_category_show_in_table_field($term_id) {
    if (isset($_POST['show_in_table'])) {
        update_term_meta($term_id, 'show_in_table', '1');
    } else {
        update_term_meta($term_id, 'show_in_table', '0');
    }
}

add_shortcode('wc_categories_table', 'display_wc_categories_table');

function display_wc_categories_table($atts) {
    $args = array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'meta_query' => array(
            array(
                'key'     => 'show_in_table',
                'value'   => '1',
                'compare' => '='
            )
        )
    );
    
    $categories = get_terms($args);
    
    if (empty($categories)) {
        return '<p>هیچ دسته‌بندی برای نمایش انتخاب نشده است.</p>';
    }
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    ob_start();
    ?>
    <div class="wc-categories-table-container">
        <div class="wc-table-header">
            <h3 class="wc-table-title">جدول قیمت‌های محصولات</h3>
            <div class="wc-categories-tabs-horizontal">
                <div class="nav nav-tabs" id="wcCategoriesTabs" role="tablist">
                    <?php foreach ($categories as $index => $category):
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image = wp_get_attachment_url($thumbnail_id);
                    ?>
                        <button class="nav-link wc-tab-btn <?php echo $index === 0 ? 'active' : ''; ?>" 
                                id="tab-<?php echo $category->term_id; ?>-btn"
                                data-bs-toggle="tab" 
                                data-bs-target="#tab-<?php echo $category->term_id; ?>"
                                type="button"
                                role="tab"
                                aria-controls="tab-<?php echo $category->term_id; ?>"
                                aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <?php if($image): ?>
                                <img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>" class="wc-cat-thumb">
                            <?php endif; ?>
                            <span><?php echo $category->name; ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="tab-content" id="wcCategoriesTabContent">
            <?php foreach ($categories as $index => $category): ?>
                <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>" 
                     id="tab-<?php echo $category->term_id; ?>"
                     role="tabpanel"
                     aria-labelledby="tab-<?php echo $category->term_id; ?>-btn">
                    <?php
                    $products_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $category->term_id
                            )
                        )
                    );
                    
                    $products = new WP_Query($products_args);
                    
                    if ($products->have_posts()):
                        $attributes = wc_get_attribute_taxonomies();
                        ?>
                        <div class="wc-products-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>محصول</th>
                                        <?php foreach ($attributes as $attribute): ?>
                                            <th><?php echo $attribute->attribute_label; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($products->have_posts()): $products->the_post(); 
                                        $product = wc_get_product(get_the_ID());
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </td>
                                            <?php foreach ($attributes as $attribute): 
                                                $attribute_name = $attribute->attribute_name;
                                                $attribute_value = $product->get_attribute($attribute_name);
                                            ?>
                                                <td><?php echo $attribute_value ?: '-'; ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="wc-no-products">هیچ محصولی در این دسته‌بندی یافت نشد.</p>
                    <?php endif; 
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    
    return ob_get_clean();
}