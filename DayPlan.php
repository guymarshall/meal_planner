<?php

require_once 'DayOfWeek.php';
require_once 'Meal.php';

final class DayPlan
{
    public function __construct(
        public DayOfWeek $day,
        public Meal $breakfast,
        public Meal $lunch,
        public Meal $tea,
    ) {}
}
