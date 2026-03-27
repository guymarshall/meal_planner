<?php

require_once 'DayPlan.php';

final class MealPlan
{
    public function __construct(
        public DayPlan $monday,
        public DayPlan $tuesday,
        public DayPlan $wednesday,
        public DayPlan $thursday,
        public DayPlan $friday,
        public DayPlan $saturday,
        public DayPlan $sunday,
    ) {}
}
