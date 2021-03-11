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
            $mysql = "INSERT INTO payments (Payment_Id, Payment_Amount_Paid, Payment_Amount_Due, Payment_Type, Payment_Invoice_Id, Payment_Client_Id) VALUES ($AmountPaid, $AmountDue, $PaymentType, $Invoice_Id, $ClientName)";
        }
        catch(Exception $e)
        {
            echo "Couldn't Complete the payment";
        }
    }
}