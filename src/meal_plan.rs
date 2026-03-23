use crate::day_plan::DayPlan;

#[derive(Debug)]
pub(crate) struct MealPlan<'a> {
    pub(crate) monday: DayPlan<'a>,
    pub(crate) tuesday: DayPlan<'a>,
    pub(crate) wednesday: DayPlan<'a>,
    pub(crate) thursday: DayPlan<'a>,
    pub(crate) friday: DayPlan<'a>,
    pub(crate) saturday: DayPlan<'a>,
    pub(crate) sunday: DayPlan<'a>,
}
