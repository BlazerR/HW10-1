<?php
//set default value
$message = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        // make sure the user enters both dates
            if (empty($invoice_date_s) || 
             empty($due_date_s)) { 
             $message = "Please enter two valid dates."; 
             break; 
         } 
        // convert date strings to DateTime objects
            try { 
             $invoice_date_o = new DateTime($invoice_date_s); 
             $due_date_o = new DateTime($due_date_s); 
         } catch (Exception $e) { 
             $message = 'Make sure both of your dates are valid please.'; 
             break; 
         } 

        // and use a try/catch to make sure the dates are valid

        // make sure the due date is after the invoice date
          if ($due_date_o < $invoice_date_o) { 
             $message = 'The due date must come after the invoice date. Please try                 again.'; 
               break; 
         } 

        // format both dates
        $invoice_date_f = 'not implemented yet';
        $due_date_f = 'not implemented yet'; 
        
        // get the current date and time and format it
        $current_date_f = 'not implemented yet';
        $current_time_f = 'not implemented yet';
        
        // get the amount of time between the current date and the due date
        // and format the due date message
        $due_date_message = 'not implemented yet';

        break;
}
include 'date_tester.php';
?>