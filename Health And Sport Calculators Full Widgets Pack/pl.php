<?php

$result = null;
if(isset($_POST['intensity'])){
    $intensity = $_POST['intensity'];
    $volume = $_POST['volume'];
    $result = $intensity * $volume;
    $result = 'Your practice load weight is ' . $result;
}
?>
<style>
    h1, p{
        font-family: 'Roboto'; font-weight: 100;
        display: block;
    }
    .warning{
        font-weight: 400;
        padding: 5px; color: red;
        background-color: #eee;
        border-radius: 4px;
        font-size: 24px;
    }
    .elementor-1244 .elementor-element.elementor-element-13a3bbb{
        display: none;
    }
    select, input{
        border: 0px solid gray;
        margin-top: 2px;
        background-color: #eee;
        color: black;
    }
    label{
        width: 100%; font-weight: 200;
    }
    input{ width: 100%; }
</style>
<section class="elementor-section elementor-top-section elementor-element  elementor-section-content-bottom elementor-section-boxed elementor-section-height-default elementor-section-height-default" style="padding: 50px;">
    <div class="elementor-container elementor-column-gap-default">
        <h1>Practice Load</h1><br>
    </div>
     <div class="elementor-container elementor-column-gap-default">
        <?php if(!empty($result)){ echo '<p class="warning">' . $result . '</p>'; } ?>
    </div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element">
            <div>
                <form action="" method="post">
                    <p><label>Intensity<br>
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" autocomplete="name" aria-required="true" aria-invalid="false" value="" type="number" name="intensity" required></label>
                    </p>
                    <p><label>Volume<br>
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" autocomplete="name" aria-required="true" aria-invalid="false" value="" type="number" name="volume" required></label>
                    </p>
                    <p><input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Calculate" style="width: 100%;"><span class="wpcf7-spinner"></span></p>
                </form>
            </div>
        </div>
    </div>
</section>
