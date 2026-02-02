<?php

require_once 'DayPlan.php';
require_once 'DayOfWeek.php';
require_once 'MealPlan.php';

// TODO: Send meal plan e.g. Monday breakfast this, Monday lunch this
// TODO: list of breakfasts and list of dinners
// TODO: Save meal plan to "output.txt" every Friday at 16:00
// TODO: EXTENSION: Some meals are split between days e.g. bolognese on Wednesday tea and Friday tea
// TODO: EXTENSION: Email list
// TODO: EXTENSION: Some meals need more weight so they come up more regularly - some 4x more regular, some 2x more regular, some 1x more regular
// TODO: EXTENSION: each meal has ingredient list, so list of ingredients needed in email

function get_random($meals): Meal
{
    $max = count($meals) - 1;
    $randomIndex = rand(0, $max);
    return new Meal($meals[$randomIndex]);
}

function main()
{
    $breakfasts = file("breakfasts.txt");
    $dinners = file("dinners.txt");

    $mondayPlan = new DayPlan(DayOfWeek::Monday, get_random($breakfasts), get_random($dinners), get_random($dinners));
    $tuesdayPlan = new DayPlan(DayOfWeek::Tuesday, get_random($breakfasts), get_random($dinners), get_random($dinners));
    $wednesdayPlan = new DayPlan(DayOfWeek::Wednesday, get_random($breakfasts), get_random($dinners), get_random($dinners));
    $thursdayPlan = new DayPlan(DayOfWeek::Thursday, get_random($breakfasts), get_random($dinners), get_random($dinners));
    $fridayPlan = new DayPlan(DayOfWeek::Friday, get_random($breakfasts), get_random($dinners), get_random($dinners));
    $saturdayPlan = new DayPlan(DayOfWeek::Saturday, get_random($breakfasts), get_random($dinners), get_random($dinners));
    $sundayPlan = new DayPlan(DayOfWeek::Sunday, get_random($breakfasts), get_random($dinners), get_random($dinners));

    $mealPlan = new MealPlan($mondayPlan, $tuesdayPlan, $wednesdayPlan, $thursdayPlan, $fridayPlan, $saturdayPlan, $sundayPlan);

    echo '<pre>';
    print_r($mealPlan);
    echo '</pre>';
}

main();
