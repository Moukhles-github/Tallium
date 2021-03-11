<?php
require("DAL.class.php");
require_once('utilities.class.php');



    //Future Works
        
    /*  
        - Search by Name, Lname, Jobs, Date, Phone Number.
        - Sort By Name, Lname, Jobs, Date. 
        - Pagination.   
        - Add Jobs With triggers
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
        - Add Clients
        - Edit Clients
        - Toggle Client Status
    */


    //// Execute Query methods \\ 


    // Create New Clients \\ 
    public function _addClient($Fname, $Lname, $Address, $Date, $Ph_Number, $jobs)
    {
        try {

            // My Sql Query
            $mysql = "INSERT INTO clients (Client_Id, Client_Fname, Client_Lname, Client_Address, Client_Date, Client_Status, Client_Ph_Number, ClientJobs) Values (NULL, $Fname, $Lname, $Address, $Date, $Ph_Number, $jobs)";

            //Execute the query
            $result = $this->db->ExecuteQuery($mysql);

            //Return the values
            return ($result);
        } catch (Exception $e) {
            echo "Couldn't Add Cleint"; // Error Message
        }
    }


    // Edit Existing Client \\
    public function _editClient($Id, $Fname, $Lname, $Address, $Date, $Ph_Number)
    {
        try {
            // My Sql Query
            $mysql = "UPDATE clients SET Client_Fname = $Fname, Client_Lname = $Lname, Client_Address = $Address, Client_Date = $Date, Client_PH_Number = $Ph_Number WHERE Client_id = $Id";

            //Execute the query
            $result = $this->db->ExecuteQuery($mysql);

            //Return the values
            return ($result);
        } catch (Exception $e) {
            echo "Couln't Update Client";
        }
    }


    //Change Client Status Active/UnActive
    public function _toggleClient($Id, $Statusval)
    {
        try {
            // My Sql Query
            $mysql = "UPDATE clients SET Client_Status = $Statusval WHERE Client_id = $Id";

            //Execute the query
            $result = $this->db->ExecuteQuery($mysql);

            //Return the values
            return ($result);
        }
        catch (Exception $e) {
            echo "Couln't Change Client Status";
        }
    }



    ///// Get Client Data \\\\\\\\\


    // Get only clients name for apps usage
    public function _getallClientsnames()
    {
        try {
            // My Sql Query
            $mysql = "SELECT Client_Fname, Client_Lname, Client_Id FROM clients";

            //Execute the query
            $result = $this->db->getData($mysql);

            //Return the values
            return ($result);
        }
        catch (Exception $e) {
            echo "Cant get Client Names";
        }
    }


    //Get Clients to populate data
    public function _getallClients()
    {
        try {
            // My Sql Query
            $mysql = "SELECT Client_Fname, Client_Lname, Client_Id, Client_Address, Client_Date, Client_Ph, Client_Jobs FROM clients";

            //Execute the query
            $result = $this->db->getData($mysql);

            //Return the values
            return ($result);
        }
        catch (Exception $e) {
            echo "Can't Get Clients";
        }
    }


}
