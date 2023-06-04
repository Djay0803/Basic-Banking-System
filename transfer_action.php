<?php
    require 'database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //get the account numbers and amount
        $from_account_num = $_POST['fromaccount'];
        $to_account_num = $_POST['toaccount'];
        $transfer_amount = $_POST['amount'];
        
        //search for account existance and balance
        $search = "Select * from customer where account_no='$from_account_num' LIMIT 1";

        $search_result = $conn->query($search);
        
        if($from_account_num == $to_account_num)
        {
            header("Location: transfer.php?same_account=true");                     
            exit();
        }else{
            if ($search_result->num_rows > 0){
                while($result = $search_result->fetch_assoc()){
                    #echo "account found";
                    //Check for insufficient balance or 0 balance
                    if (($result['balance'] == 0) OR ($result['balance'] <= $transfer_amount)) {  
                        header("Location: transfer.php?balance=null");             
                        exit();
                    }else {
                        #Send if sufficient money is present
            
                        $find_to_account = "Select * FROM customer where account_no='$to_account_num' LIMIT 1"; 
                            
                        $search_acc = $conn->query($find_to_account);
                        $to_result = mysqli_fetch_assoc($search_acc);
                        #if we get values successfully             
                        if ($to_result) {
                             #adding money
                            $total_amount_after_add = $to_result['balance'] + $transfer_amount;
            
                             #funds are added query
                            $add_fund = "UPDATE customer SET balance='$total_amount_after_add' WHERE account_no='$to_account_num'";
                            $done_adding_fund = $conn->query($add_fund);
                             #subtracting money
                            $total_amount_after_subtract = $result['balance'] - $transfer_amount;
                                
                            #funds are subtracted query
                            $subtract_fund = "UPDATE customer SET balance='$total_amount_after_subtract' WHERE account_no='$from_account_num'";
                                
                            $done_subtracting_fund = $conn->query($subtract_fund);
            
                            //ADD RECORD TO THE TRANSACTION HISTORY TABLE
                            date_default_timezone_set('Asia/Kolkata');                 
                            $current_time = date("Y-m-d");
                            $add_trans_record = "INSERT INTO `transaction_history` (`from_account`, `to_account`, `transfer_amount`, `date`) VALUES ('$from_account_num', '$to_account_num', '$transfer_amount', '$current_time')";
                            $conn->query($add_trans_record);
            
                            //IF FUND ADDED SUCCESSFULLY                 
                            if ($done_adding_fund && $done_subtracting_fund) {
                                //REDIRECT TO THE RESPECTED DASHBOARD IS SESSION ARE SET                     
                                header("Location: transfer.php?transfer=true");                     
                                exit();
                            }else{                                        
                                header("Location: transfer.php?transfer_failed=true");                     
                                exit();                 
                            }             
                        }        
                    }
                }   
            }else{         
                #if account is not found         
                echo "<script>alert('Customer Not Found!');</script>";         
                header("Location: transfer.php");         
                exit();     
            }
        } 
    }
?>