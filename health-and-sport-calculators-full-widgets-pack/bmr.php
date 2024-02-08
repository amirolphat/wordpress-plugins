<?php

$result = null;
if(isset($_POST['weight'])){
    if($_POST['gender'] == 'woman'){
        $result = 655 + ($_POST['weight'] * 9.6) + ($_POST['height'] * 1.8) + ($_POST['age'] * 4.7);
    }else{
        $result = 66 + ($_POST['weight'] * 13.7) + ($_POST['height'] * 5) + ($_POST['age'] * 6.8);
    }
    if($_POST['activity'] == 'Immobile or with minimal mobility'){
        $result = $result * 1.2;
    }elseif($_POST['activity'] == 'Light sports activity 1-3 days a week'){
        $result = $result * 1.375;
    }elseif($_POST['activity'] == 'Moderate sports activity 3-5 days a week'){
        $result = $result * 1.55;
    }elseif($_POST['activity'] == 'Heavy sports activity 6-7 days a week'){
        $result = $result * 1.725;
    }elseif($_POST['activity'] == 'Very heavy sports activity 6-7 days a week or physical work'){
        $result = $result * 1.9;
    }
    $result = 'YOUR BMR: ' . round($result) . '<span style="color: black; font-size: 12px;"> A ' . $_POST['gender'] . ' with a weight of ' . $_POST['weight'] . ' kg and a height of ' . $_POST['height'] . ' cm and ' . $_POST['age'] . ' years old with an activity level of ' . $_POST['activity'] . '.</span>';
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
        <h1>Basical metabolism rate (BMR)</h1><br>
    </div>
     <div class="elementor-container elementor-column-gap-default">
        <?php if(!empty($result)){ echo '<p class="warning">' . $result . '</p>'; } ?>
    </div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element">
            <div>
                <form action="" method="post">
                    <p><label> Your Gender<br>
                    <select name="gender" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required>
                        <option value="man">Man</option>
                        <option value="woman">Woman</option>
                    </select></label>
                    </p>
                    <p><label> Your weight (kg)<br>
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" autocomplete="name" aria-required="true" aria-invalid="false" value="" type="number" name="weight" required></label>
                    </p>
                    <p><label> Your height (cm)<br>
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" autocomplete="name" aria-required="true" aria-invalid="false" value="" type="number" name="height" required></label>
                    </p>
                    <p><label> Your age (years)<br>
                    <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" autocomplete="name" aria-required="true" aria-invalid="false" value="" type="number" name="age" required></label>
                    </p>
                    <p><label> Your activity rate<br>
                    <select name="activity" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required>
                        <option value="Immobile or with minimal mobility">Immobile or with minimal mobility</option>
                        <option value="Light sports activity 1-3 days a week">Light sports activity 1-3 days a week</option>
                        <option value="Moderate sports activity 3-5 days a week">Moderate sports activity 3-5 days a week</option>
                        <option value="Heavy sports activity 6-7 days a week">Heavy sports activity 6-7 days a week</option>
                        <option value="Very heavy sports activity 6-7 days a week or physical work">Very heavy sports activity 6-7 days a week or physical work</option>
                    </select></label>
                    </p>
                    <p><input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Calculate" style="width: 100%;"><span class="wpcf7-spinner"></span>
                </form>
            </div>
        </div>
    </div>
</section>
