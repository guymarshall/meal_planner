package com.marshall.guy;

import java.util.ArrayList;
import java.util.Random;
import java.util.Scanner;

import javax.swing.JFrame;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.SwingUtilities;
import java.awt.*;

import java.io.File;
import java.io.FileNotFoundException;

// TODO: EXTENSION: Some meals are split between days e.g. bolognese on Wednesday tea and Friday tea
// TODO: EXTENSION: Some meals need more weight so they come up more regularly - some 4x more regular, some 2x more regular, some 1x more regular
// TODO: EXTENSION: each meal has ingredient list, so list of ingredients needed

public class Main {
    private static ArrayList<String> getMeals(String filepath) {
        ArrayList<String> meals = new ArrayList<String>();

        try {
            Scanner scanner = new Scanner(new File(filepath));
            while (scanner.hasNext()){
                meals.add(scanner.next());
            }
            scanner.close();
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }

        return meals;
    }

    public static Meal getRandom(ArrayList<String> meals) {
        Random random = new Random();
        int index = random.nextInt(meals.size());
        return new Meal(meals.get(index));
    }

    public static void showMealPlanner(MealPlan mealPlan) {
        SwingUtilities.invokeLater(() -> {
            JFrame frame = new JFrame("Weekly Meal Plan");
            frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
            frame.setLayout(new BorderLayout());

            String[][] tableData = new String[7][4];

            tableData[0][0] = "Monday";
            tableData[0][1] = mealPlan.monday.breakfast.name;
            tableData[0][2] = mealPlan.monday.lunch.name;
            tableData[0][3] = mealPlan.monday.tea.name;

            tableData[1][0] = "Tuesday";
            tableData[1][1] = mealPlan.tuesday.breakfast.name;
            tableData[1][2] = mealPlan.tuesday.lunch.name;
            tableData[1][3] = mealPlan.tuesday.tea.name;

            tableData[2][0] = "Wednesday";
            tableData[2][1] = mealPlan.wednesday.breakfast.name;
            tableData[2][2] = mealPlan.wednesday.lunch.name;
            tableData[2][3] = mealPlan.wednesday.tea.name;

            tableData[3][0] = "Thursday";
            tableData[3][1] = mealPlan.thursday.breakfast.name;
            tableData[3][2] = mealPlan.thursday.lunch.name;
            tableData[3][3] = mealPlan.thursday.tea.name;

            tableData[4][0] = "Friday";
            tableData[4][1] = mealPlan.friday.breakfast.name;
            tableData[4][2] = mealPlan.friday.lunch.name;
            tableData[4][3] = mealPlan.friday.tea.name;

            tableData[5][0] = "Saturday";
            tableData[5][1] = mealPlan.saturday.breakfast.name;
            tableData[5][2] = mealPlan.saturday.lunch.name;
            tableData[5][3] = mealPlan.saturday.tea.name;

            tableData[6][0] = "Sunday";
            tableData[6][1] = mealPlan.sunday.breakfast.name;
            tableData[6][2] = mealPlan.sunday.lunch.name;
            tableData[6][3] = mealPlan.sunday.tea.name;

            String[] columnNames = {"Day", "Breakfast", "Lunch", "Tea"};

            JTable table = new JTable(tableData, columnNames);
            JScrollPane scrollPane = new JScrollPane(table);
            frame.add(scrollPane, BorderLayout.CENTER);

            frame.setSize(400, 300);
            frame.setVisible(true);
        });
    }

    public static void main(String[] args) {
        ArrayList<String> breakfasts = getMeals("breakfasts.txt");
        ArrayList<String> dinners = getMeals("dinners.txt");

        DayPlan mondayPlan = new DayPlan(DayOfWeek.MONDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));
        DayPlan tuesdayPlan = new DayPlan(DayOfWeek.TUESDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));
        DayPlan wednesdayPlan = new DayPlan(DayOfWeek.WEDNESDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));
        DayPlan thursdayPlan = new DayPlan(DayOfWeek.THURSDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));
        DayPlan fridayPlan = new DayPlan(DayOfWeek.FRIDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));
        DayPlan saturdayPlan = new DayPlan(DayOfWeek.SATURDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));
        DayPlan sundayPlan = new DayPlan(DayOfWeek.SUNDAY, getRandom(breakfasts), getRandom(dinners), getRandom(dinners));

        MealPlan mealPlan = new MealPlan(mondayPlan, tuesdayPlan, wednesdayPlan, thursdayPlan, fridayPlan, saturdayPlan, sundayPlan);

        showMealPlanner(mealPlan);
    }
}