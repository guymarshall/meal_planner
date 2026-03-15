package com.marshall.guy;

public class MealPlan {
    public DayPlan monday;
    public DayPlan tuesday;
    public DayPlan wednesday;
    public DayPlan thursday;
    public DayPlan friday;
    public DayPlan saturday;
    public DayPlan sunday;

    public MealPlan(DayPlan monday, DayPlan tuesday, DayPlan wednesday, DayPlan thursday, DayPlan friday, DayPlan saturday, DayPlan sunday) {
        this.monday = monday;
        this.tuesday = tuesday;
        this.wednesday = wednesday;
        this.thursday = thursday;
        this.friday = friday;
        this.saturday = saturday;
        this.sunday = sunday;
    }
}
