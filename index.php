<?php

require_once 'config.php';

require_once 'DayPlan.php';
require_once 'DayOfWeek.php';
require_once 'MealPlan.php';

// TODO: Save meal plan to "YYYY.MM.DD_meal_plan.txt" every Friday at 16:00
// TODO: Email list

function getRandom($meals): Meal
{
    $max = count($meals) - 1;
    $randomIndex = rand(0, $max);
    return new Meal($meals[$randomIndex]);
}

$breakfasts = file('breakfasts.txt');
$dinners = file('dinners.txt');

$mondayPlan = new DayPlan(DayOfWeek::Monday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));
$tuesdayPlan = new DayPlan(DayOfWeek::Tuesday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));
$wednesdayPlan = new DayPlan(DayOfWeek::Wednesday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));
$thursdayPlan = new DayPlan(DayOfWeek::Thursday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));
$fridayPlan = new DayPlan(DayOfWeek::Friday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));
$saturdayPlan = new DayPlan(DayOfWeek::Saturday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));
$sundayPlan = new DayPlan(DayOfWeek::Sunday, getRandom($breakfasts), getRandom($dinners), getRandom($dinners));

$mealPlan = new MealPlan($mondayPlan, $tuesdayPlan, $wednesdayPlan, $thursdayPlan, $fridayPlan, $saturdayPlan, $sundayPlan);

?>

<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
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
</body>

</html>