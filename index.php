<?php

require_once 'config.php';

require_once 'DayPlan.php';
require_once 'DayOfWeek.php';
require_once 'MealPlan.php';

// TODO: Send meal plan e.g. Monday breakfast this, Monday lunch this
// TODO: list of breakfasts and list of dinners
// TODO: Save meal plan to 'output.txt' every Friday at 16:00
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

$breakfasts = file('breakfasts.txt');
$dinners = file('dinners.txt');

$mondayPlan = new DayPlan(DayOfWeek::Monday, get_random($breakfasts), get_random($dinners), get_random($dinners));
$tuesdayPlan = new DayPlan(DayOfWeek::Tuesday, get_random($breakfasts), get_random($dinners), get_random($dinners));
$wednesdayPlan = new DayPlan(DayOfWeek::Wednesday, get_random($breakfasts), get_random($dinners), get_random($dinners));
$thursdayPlan = new DayPlan(DayOfWeek::Thursday, get_random($breakfasts), get_random($dinners), get_random($dinners));
$fridayPlan = new DayPlan(DayOfWeek::Friday, get_random($breakfasts), get_random($dinners), get_random($dinners));
$saturdayPlan = new DayPlan(DayOfWeek::Saturday, get_random($breakfasts), get_random($dinners), get_random($dinners));
$sundayPlan = new DayPlan(DayOfWeek::Sunday, get_random($breakfasts), get_random($dinners), get_random($dinners));

$mealPlan = new MealPlan($mondayPlan, $tuesdayPlan, $wednesdayPlan, $thursdayPlan, $fridayPlan, $saturdayPlan, $sundayPlan);

?>

<style>
    .meal-table {
        border-collapse: collapse;
        table-layout: fixed;

        width: 100%;
        max-width: 900px;

        margin: 20px auto;

        font-family: Arial, sans-serif;
        background-color: #fff;
    }

    .meal-table th,
    .meal-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        transition: background-color 0.15s ease;
    }

    .meal-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .meal-table td:first-child {
        font-weight: bold;
        background-color: #fafafa;
    }
</style>
<table class="meal-table">
    <tr>
        <th></th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
    </tr>
    <tr>
        <td>Breakfast</td>
        <td><?php echo $mealPlan->monday->breakfast->name ?></td>
        <td><?php echo $mealPlan->tuesday->breakfast->name ?></td>
        <td><?php echo $mealPlan->wednesday->breakfast->name ?></td>
        <td><?php echo $mealPlan->thursday->breakfast->name ?></td>
        <td><?php echo $mealPlan->friday->breakfast->name ?></td>
        <td><?php echo $mealPlan->saturday->breakfast->name ?></td>
        <td><?php echo $mealPlan->sunday->breakfast->name ?></td>
    </tr>
    <tr>
        <td>Lunch</td>
        <td><?php echo $mealPlan->monday->lunch->name ?></td>
        <td><?php echo $mealPlan->tuesday->lunch->name ?></td>
        <td><?php echo $mealPlan->wednesday->lunch->name ?></td>
        <td><?php echo $mealPlan->thursday->lunch->name ?></td>
        <td><?php echo $mealPlan->friday->lunch->name ?></td>
        <td><?php echo $mealPlan->saturday->lunch->name ?></td>
        <td><?php echo $mealPlan->sunday->lunch->name ?></td>
    </tr>
    <tr>
        <td>Tea</td>
        <td><?php echo $mealPlan->monday->tea->name ?></td>
        <td><?php echo $mealPlan->tuesday->tea->name ?></td>
        <td><?php echo $mealPlan->wednesday->tea->name ?></td>
        <td><?php echo $mealPlan->thursday->tea->name ?></td>
        <td><?php echo $mealPlan->friday->tea->name ?></td>
        <td><?php echo $mealPlan->saturday->tea->name ?></td>
        <td><?php echo $mealPlan->sunday->tea->name ?></td>
    </tr>
</table>