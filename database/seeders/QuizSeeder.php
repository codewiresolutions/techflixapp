<?php

namespace Database\Seeders;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $quiz = Quiz::create(['title' => 'Sample Quiz', 'description' => 'Test your knowledge!']);
//        $question = Question::create(['quiz_id' => $quiz->id, 'text' => 'What is 2 + 2?']);
//        Option::create(['question_id' => $question->id, 'text' => '3', 'is_correct' => false]);
//        Option::create(['question_id' => $question->id, 'text' => '4', 'is_correct' => true]);
//        Option::create(['question_id' => $question->id, 'text' => '5', 'is_correct' => false]);

        // Create a Cricket Quiz
        $quiz = Quiz::create(['title' => 'Cricket Quiz CT2035', 'description' => 'Test your knowledge about Cricket!']);

        // Question 1: General cricket knowledge
        $question1 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who holds the record for the most runs in a single Test match?']);
        Option::create(['question_id' => $question1->id, 'text' => 'Don Bradman', 'is_correct' => false]);
        Option::create(['question_id' => $question1->id, 'text' => 'Sachin Tendulkar', 'is_correct' => true]);
        Option::create(['question_id' => $question1->id, 'text' => 'Brian Lara', 'is_correct' => false]);
        Option::create(['question_id' => $question1->id, 'text' => 'Ricky Ponting', 'is_correct' => false]);

        // Question 2: Cricket World Cup
        $question2 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Which country won the Cricket World Cup in 2019?']);
        Option::create(['question_id' => $question2->id, 'text' => 'India', 'is_correct' => false]);
        Option::create(['question_id' => $question2->id, 'text' => 'Australia', 'is_correct' => false]);
        Option::create(['question_id' => $question2->id, 'text' => 'England', 'is_correct' => true]);
        Option::create(['question_id' => $question2->id, 'text' => 'New Zealand', 'is_correct' => false]);

        // Question 3: Bowling Record
        $question3 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who has the record for the most wickets in ODI cricket?']);
        Option::create(['question_id' => $question3->id, 'text' => 'Shane Warne', 'is_correct' => false]);
        Option::create(['question_id' => $question3->id, 'text' => 'Muttiah Muralitharan', 'is_correct' => true]);
        Option::create(['question_id' => $question3->id, 'text' => 'Wasim Akram', 'is_correct' => false]);
        Option::create(['question_id' => $question3->id, 'text' => 'Anil Kumble', 'is_correct' => false]);

        // Question 4: T20 World Cup
        $question4 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Which country won the first T20 World Cup in 2007?']);
        Option::create(['question_id' => $question4->id, 'text' => 'South Africa', 'is_correct' => false]);
        Option::create(['question_id' => $question4->id, 'text' => 'India', 'is_correct' => true]);
        Option::create(['question_id' => $question4->id, 'text' => 'Pakistan', 'is_correct' => false]);
        Option::create(['question_id' => $question4->id, 'text' => 'England', 'is_correct' => false]);

        // Question 5: Fastest Century in ODIs
        $question5 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who holds the record for the fastest century in ODI cricket?']);
        Option::create(['question_id' => $question5->id, 'text' => 'AB de Villiers', 'is_correct' => false]);
        Option::create(['question_id' => $question5->id, 'text' => 'Shahid Afridi', 'is_correct' => false]);
        Option::create(['question_id' => $question5->id, 'text' => 'Corey Anderson', 'is_correct' => false]);
        Option::create(['question_id' => $question5->id, 'text' => 'Irfan Pathan', 'is_correct' => true]);

        // Question 6: First Cricket World Cup
        $question6 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who won the first Cricket World Cup in 1975?']);
        Option::create(['question_id' => $question6->id, 'text' => 'West Indies', 'is_correct' => true]);
        Option::create(['question_id' => $question6->id, 'text' => 'Australia', 'is_correct' => false]);
        Option::create(['question_id' => $question6->id, 'text' => 'India', 'is_correct' => false]);
        Option::create(['question_id' => $question6->id, 'text' => 'England', 'is_correct' => false]);

        // Question 7: Most Runs in T20I
        $question7 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who holds the record for the most runs in T20I cricket?']);
        Option::create(['question_id' => $question7->id, 'text' => 'Virat Kohli', 'is_correct' => true]);
        Option::create(['question_id' => $question7->id, 'text' => 'Chris Gayle', 'is_correct' => false]);
        Option::create(['question_id' => $question7->id, 'text' => 'Rohit Sharma', 'is_correct' => false]);
        Option::create(['question_id' => $question7->id, 'text' => 'Martin Guptill', 'is_correct' => false]);

        // Question 8: ODI Record for Most Sixes
        $question8 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who holds the record for the most sixes in an ODI career?']);
        Option::create(['question_id' => $question8->id, 'text' => 'Shahid Afridi', 'is_correct' => true]);
        Option::create(['question_id' => $question8->id, 'text' => 'Chris Gayle', 'is_correct' => false]);
        Option::create(['question_id' => $question8->id, 'text' => 'MS Dhoni', 'is_correct' => false]);
        Option::create(['question_id' => $question8->id, 'text' => 'Virat Kohli', 'is_correct' => false]);

        // Question 9: Fastest Bowler in Cricket History
        $question9 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who is regarded as the fastest bowler in cricket history?']);
        Option::create(['question_id' => $question9->id, 'text' => 'Shane Bond', 'is_correct' => false]);
        Option::create(['question_id' => $question9->id, 'text' => 'Brett Lee', 'is_correct' => false]);
        Option::create(['question_id' => $question9->id, 'text' => 'Shoaib Akhtar', 'is_correct' => true]);
        Option::create(['question_id' => $question9->id, 'text' => 'Waqar Younis', 'is_correct' => false]);

        // Question 10: First Indian to score a Test Century
        $question10 = Question::create(['quiz_id' => $quiz->id, 'text' => 'Who was the first Indian cricketer to score a Test century?']);
        Option::create(['question_id' => $question10->id, 'text' => 'Sunil Gavaskar', 'is_correct' => false]);
        Option::create(['question_id' => $question10->id, 'text' => 'Dilip Sardesai', 'is_correct' => true]);
        Option::create(['question_id' => $question10->id, 'text' => 'Sachin Tendulkar', 'is_correct' => false]);
        Option::create(['question_id' => $question10->id, 'text' => 'Kapil Dev', 'is_correct' => false]);


    }
}
