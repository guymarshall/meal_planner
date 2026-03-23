use crate::{DayOfWeek, meal::Meal};

#[derive(Debug)]
pub(crate) struct DayPlan<'a> {
    pub(crate) day: DayOfWeek,
    pub(crate) breakfast: &'a Meal,
    pub(crate) lunch: &'a Meal,
    pub(crate) tea: &'a Meal,
}
