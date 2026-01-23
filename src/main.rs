// TODO: Send meal plan e.g. Monday breakfast this, Monday lunch this
// TODO: list of breakfasts and list of dinners
// TODO: Save meal plan to "output.txt" every Friday at 16:00
// TODO: EXTENSION: Some meals are split between days e.g. bolognese on Wednesday tea and Friday tea
// TODO: EXTENSION: Email list
// TODO: EXTENSION: Some meals need more weight so they come up more regularly - some 4x more regular, some 2x more regular, some 1x more regular
// TODO: EXTENSION: each meal has ingredient list, so list of ingredients needed in email

use std::{
    fs::File,
    io::{BufRead, BufReader},
};

use rand::prelude::*;

#[derive(Debug)]
struct Meal {
    // weighting: f64,
    // is_multi_day: bool,
    name: String,
}

#[derive(Debug)]
enum DayOfWeek {
    Monday,
    Tuesday,
    Wednesday,
    Thursday,
    Friday,
    Saturday,
    Sunday,
}

#[derive(Debug)]
struct DayPlan<'a> {
    day: DayOfWeek,
    breakfast: &'a Meal,
    lunch: &'a Meal,
    tea: &'a Meal,
}

#[derive(Debug)]
struct MealPlan<'a> {
    monday: DayPlan<'a>,
    tuesday: DayPlan<'a>,
    wednesday: DayPlan<'a>,
    thursday: DayPlan<'a>,
    friday: DayPlan<'a>,
    saturday: DayPlan<'a>,
    sunday: DayPlan<'a>,
}

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
