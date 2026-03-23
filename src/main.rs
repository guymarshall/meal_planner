// TODO: Save meal plan to "YYYY.MM.DD_meal_plan.txt" every Friday at 16:00
// TODO: Email list

mod day_of_week;
mod day_plan;
mod meal;
mod meal_plan;

use std::{
    fs::File,
    io::{BufRead, BufReader},
};

use rand::prelude::*;

use crate::{day_of_week::DayOfWeek, day_plan::DayPlan, meal::Meal, meal_plan::MealPlan};

fn read_file_into_vec(filename: &str) -> Vec<Meal> {
    let file: File = File::open(filename).unwrap();
    let reader: BufReader<File> = BufReader::new(file);

    reader
        .lines()
        .map(|line: Result<String, std::io::Error>| line.unwrap())
        .map(|line: String| Meal { name: line })
        .collect()
}

fn main() {
    let breakfasts: Vec<Meal> = read_file_into_vec("breakfasts.txt");
    let dinners: Vec<Meal> = read_file_into_vec("dinners.txt");

    let mut rng: rand::prelude::ThreadRng = rand::rng();

    let monday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Monday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };
    let tuesday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Tuesday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };
    let wednesday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Wednesday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };
    let thursday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Thursday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };
    let friday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Friday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };
    let saturday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Saturday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };
    let sunday_plan: DayPlan = DayPlan {
        day: DayOfWeek::Sunday,
        breakfast: breakfasts.choose(&mut rng).unwrap(),
        lunch: dinners.choose(&mut rng).unwrap(),
        tea: dinners.choose(&mut rng).unwrap(),
    };

    let meal_plan: MealPlan = MealPlan {
        monday: monday_plan,
        tuesday: tuesday_plan,
        wednesday: wednesday_plan,
        thursday: thursday_plan,
        friday: friday_plan,
        saturday: saturday_plan,
        sunday: sunday_plan,
    };

    println!("Meal plan: {:?}", meal_plan);
}
