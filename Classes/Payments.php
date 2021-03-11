<?php
require("DAL.class.php");
require_once('utilities.class.php');



    //Future Works
        
    /*  
        - Search by Name, Lname, Jobs, Date, Phone Number.
        - Sort By Name, Lname, Jobs, Date. 
        - Pagination.   
    */


class _client
{
    //Constructors
    public
    function __construct()
    {
        $this->db = new DAL();
    }

    public
    function __destruct()
    {

        $this->db = null;
    }

       /// Methods \\\
    /* 
        - Make a Payments
        - Get Payments
        - Refund Payments
    */

    //// Execute Qquery methods \\ 


    //Make a Payment function
    public function _makepayment($Invoice_Id, $AmountPaid, $AmountDue, $PaymentType, $ClientName )
    {
        try
        {
            $mysql = "INSERT INTO payments (Payment_Id, Payment_Amount_Paid, Payment_Amount_Due, Payment_Type, Payment_Invoice_Id, Payment_Client_Id, Payment_Status) VALUES (NULL, $AmountPaid, $AmountDue, $PaymentType, $Invoice_Id, $ClientName, NULL)";

            //Execute the query
            $result = $this->db->ExecuteQuery($mysql);

            //Return the values
            return ($result);
        }
        catch(Exception $e)
        {
            echo "Couldn't Complete the payment";
        }
    }


    ///// Get Data Query Method \\\\\\\\\\
    public function _getpayments()
    {
        try
        {
            $mysql = "SELECT Payment_Id, Payment_Amount_paid, Payment_Amount_due,  Payment_Type, Payment_Invoice_Id, Client_Name, Payment_Status FROM payments INNER JOIN clients ON Client_Id = Payment_Client_Id";

            //Execute the query
            $result = $this->db->getData($mysql);

            //Return the values
            return ($result);
        }
        catch(Exception $e)
        {
            echo "Couldn't Get Payments";
        }
    }

    public function _refundPayment($Payment_Id)
    {
        try 
        {
            $mysql = "UPDATE payments SET Payment_Status = 0 WHERE Payment_Id = $Payment_Id";
                 //Execute the query
                 $result = $this->db->getData($mysql);

                 //Return the values
                 return ($result);
        }
        catch (Exception $e)
        {
            echo "Couldn't Refund Payment.";
        }
    }
}
?>