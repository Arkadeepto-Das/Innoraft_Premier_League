<?php
  namespace classes;
  /**
   * This class is used to check the format of user input data.
   * 
   *   @method emailValidation()
   *     This function is used to check the password of the user.
   *   @method passwordValidation()
   *     This function is used to check the format of the password.
   */
  class Validation {

    /**
     * This function is used to check Email-ID of the user.
     * 
     *   @param string $emailId
     *     Stores the Email-ID.
     * 
     *   @return bool
     *     Returns TRUE if Email ID is valid otherwise FALSE.
     */
    public function emailValidation(string $emailId) {
      return filter_var($emailId, FILTER_VALIDATE_EMAIL);
    }

    /**
     * This function is used to check the password of the user.
     * 
     *   @param string $password
     *     Stores the password.
     * 
     *   @return bool
     *     Returns TRUE if the password is valid otherwise FALSE.
     */
    public function passwordValidation(string $password) {
      if (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=!\?]{8,20}$/", $password) == 1) {
        return TRUE;
      }
      return FALSE;
    }
  }
