package com.marshall.guy;

public class DayPlan {
    public DayOfWeek day;
    public Meal breakfast;
    public Meal lunch;
    public Meal tea;

    public DayPlan(DayOfWeek day, Meal breakfast, Meal lunch, Meal tea) {
        this.day = day;
        this.breakfast = breakfast;
        this.lunch = lunch;
        this.tea = tea;
    }
}
