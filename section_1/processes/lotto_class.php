<?php

class Lotto_Player
{

  public function get_random_number($min, $max)
  {
    return rand($min,$max);
  }

    public function get_lotto_numbers()
    {
      // numbers increaed by 1 to accomodate for 0
      $ballset_amount = $this->get_random_number(41, 50);
      $balls_to_play = $this->get_random_number(6, 8);
      $lotto_result_array = [];
      for ($i = 1; $i < $balls_to_play; $i++) {
        $new_ball_number = $this->get_random_number(1, $ballset_amount);
        if (in_array($new_ball_number, $lotto_result_array)) {
            $new_ball_number = $this->get_random_number(1, $ballset_amount);
        }
        if (!in_array($new_ball_number, $lotto_result_array)) {
            $lotto_result_array[] = $new_ball_number;
        }
      }
      return $lotto_result_array;

    }


      public function get_powerball_numbers()
      {
        // numbers increaed by 1 to accomodate for 0
        $ballset_amount = $this->get_random_number(6, 50);
        $balls_to_play = $this->get_random_number(0, 4);
        $lotto_result_array = [];
        for ($i = 1; $i < $balls_to_play; $i++) {
          $new_ball_number = $this->get_random_number(1, $ballset_amount);
          if (in_array($new_ball_number, $lotto_result_array)) {
              $new_ball_number = $this->get_random_number(1, $ballset_amount);
          }
          if (!in_array($new_ball_number, $lotto_result_array)) {
              $lotto_result_array[] = $new_ball_number;
          }
        }
        return $lotto_result_array;

      }



}


?>
