<?php
class NaiveBayes {
    private $classes = array();
    private $class_counts = array();
    private $feature_counts = array();
    private $vocabulary = array();

    public function train($samples, $labels) {
        $num_samples = count($samples);
        for ($i = 0; $i < $num_samples; $i++) {
            $label = $labels[$i];
            if (!isset($this->classes[$label])) {
                $this->classes[$label] = 0;
                $this->class_counts[$label] = 0;
                $this->feature_counts[$label] = array();
            }
            $this->classes[$label]++;
            $this->class_counts[$label]++;

            $words = $this->preprocess($samples[$i]);
            foreach ($words as $word) {
                if (!isset($this->feature_counts[$label][$word])) {
                    $this->feature_counts[$label][$word] = 0;
                }
                $this->feature_counts[$label][$word]++;
                if (!in_array($word, $this->vocabulary)) {
                    array_push($this->vocabulary, $word);
                }
            }
        }
    }

    public function predict($sample) {
        $max_prob = -1;
        $max_class = null;
        foreach ($this->classes as $class => $count) {
            $prob = $this->class_counts[$class] / array_sum($this->class_counts);
            $words = $this->preprocess($sample);
            foreach ($words as $word) {
                if (isset($this->feature_counts[$class][$word])) {
                    $prob *= $this->likelihood($class, $word);
                } else {
                    $prob *= 1 / ($this->class_counts[$class] + count($this->vocabulary));
                }
            }
            if ($prob > $max_prob) {
                $max_prob = $prob;
                $max_class = $class;
            }
        }
        // if the max_class is equal to yes, set the value of yes to approved.
        return ($max_class == "yes") ? "approved" : "declined";
    }

    private function preprocess($text) {
        $text = strtolower($text);
        $text = preg_replace('/[^\p{L}\s\d]+/u', '', $text); // exclude digits and punctuation marks
        $words = preg_split("/[\s,.;:!?]+/", $text);
        return $words;
    }

    private function frequency($class, $word) {
        if (isset($this->feature_counts[$class][$word])) {
            return $this->feature_counts[$class][$word];
        } else {
            return 0;
        }
    }
    private function likelihood($class, $word) {
        return ($this->frequency($class, $word) + 1) / ($this->class_counts[$class] + count($this->vocabulary));
    }
}


    // Read the CSV file
    $filename = 'naive_bayes/dataset.csv';
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        $data = array();
        $headers = fgetcsv($handle);
        while (($row = fgetcsv($handle)) !== FALSE) {
            $data[] = $row;
        }
        fclose($handle);
    }

    // Define the user features and Get the pre-evaluation answers from the form
    $existing_pet = $_POST['existingpet'];
    $vet_assistance = $_POST['vetassistance'];
    $living_arrangement = $_POST['livingarrangement'];
    $space_req = $_POST['spacereq'];
    $cage = $_POST['cage'];
    $leash = $_POST['leash'];
    $pens = $_POST['pens'];
    $feederer = $_POST['feederer'];
    $sleepingarea = $_POST['sleepingarea'];
    $properwaste = $_POST['properwaste'];

    
    // $pet_size = $_POST['pet_size'];
    // $living_arrangements = $_POST['living_arrangements'];

    // Define an array to map the salary range options to their corresponding numerical values
    // $salary_range_values = array(
    //     '10,000 below' => 1,
    //     '10,000 to 15,000' => 2,
    //     '15,000 to 20,000' => 3,
    //     '20,000 to 25,000' => 4,
    //     '30,000 above' => 5
    // );

    // $care_budget_values = array(
    //     '1,000 below' => 1,
    //     '2,000 to 3,000' => 2,
    //     '3,000 to 5,000' => 3,
    //     '5,000 above' => 4
    // );

    // // Convert the salary range option to a numerical value
    // $salaryRangeValue = $salary_range_values[$salaryRange];
    // // Convert the salary range option to a numerical value
    // $careBudgetValue = $care_budget_values[$careBudget];

    // Add the salary range value to the user features
    $user_features = array($existing_pet, $vet_assistance, $space_req, $sleepingarea, $living_arrangement);

    // Train the classifier on the training data
    $classifier = new NaiveBayes();
    $samples = array_map(function($row) { return implode(' ', array_slice($row, 0, 5)); },$data);
    $labels = array_column($data, 5);
    $classifier->train($samples, $labels);
    
    // Predict the label for the user features
    $predicted_label = $classifier->predict(implode(' ', $user_features));

    // Test the classifier on the testing data
    // $correct = 0;
    // $total = count($test_data);
    // foreach ($test_data as $row) {
    //     $true_label = $row[6] == 'yes' ? 'approved' : 'pending';
    //     $predicted_label = $classifier->predict(implode(' ', array_slice($row, 0, 6)));
    //     if ($predicted_label == $true_label) {
    //         $correct++;
    //     }
    // }

    // // Calculate the accuracy
    // $accuracy = $correct / $total;
    // echo $true_label . " ";
    $predicted_label;

    // Append the new row to the CSV file
    // $new_row = array_merge($user_features, array($predicted_label == 'approved' ? 'yes': 'no')); // if predicted_label is equal to approved, set the value of eligible_to_adopt to yes.
    // if (($handle = fopen($filename, 'a')) !== FALSE) {
    // fputcsv($handle, $new_row);
    // fclose($handle);
    // }



?>
