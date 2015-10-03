<?php
/**
 * Class registration
 * handles the user registration
 */
class Message
{
    /**@var object $db_connection The database connection*/
    private $db_connection = null;
    /**@var array $errors Collection of error messages*/
    public $errors = array();
    /**@var array $messages Collection of success / neutral messages */
    public $messages = array();
    
    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$message = new Message();"
     */
    public function __construct()
    {
    	 
    	// create/read session, absolutely necessary
    	session_start();
    	
    	if (isset($_POST["post"])) {
			
    		$this->addNew();
    		
    
    	}
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    public function addNew()
    {
    	 
        if (empty($_POST['message'])) {
            $this->errors[] = "Empty Message";
        } 
        elseif (!empty($_POST['message'])
            && strlen($_POST['message']) <= 100
            && strlen($_POST['message']) >= 2) 
		{
            // Create connection
			$this->db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
			
            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) 
            {

                
				$message = $this->db_connection->real_escape_string($_POST['message']);
				
				
				// escape the POST stuff
				$user_name = $_SESSION['user_name'];
				
				// database query, getting all the info of the selected user (allows login via email address in the
				// username field)
				$sql = "SELECT user_id
                        FROM users
                        WHERE user_name = '" . $user_name .  "';";
				
				 
				
				$result_of_login_check = $this->db_connection->query($sql);
				
				// if this user exists
				if ($result_of_login_check->num_rows == 1)
				{
						
					// get result row (as an object)
					$result_row = $result_of_login_check->fetch_object();
				
				
					$user_id= $result_row->user_id;
				

                    // write new user's data into database
                    $sql = "INSERT INTO messages (message_text,user_id)
                            VALUES('" . $message . "','" .$user_id."');"; 
                    
                    $query_new_message_insert = $this->db_connection->query($sql);
					
                    // if user has been added successfully
                    if ($query_new_message_insert) {
                        $this->messages[] = "New message has been created.";

                    } 
                    else 
                    {
                        $this->errors[] = "Sorry, post failed. Please try again.";
                    }
				}
                
            } 
            else 
            {
                $this->errors[] = "Sorry, no database connection.";
            }
        } 
        else 
        {
            $this->errors[] = "An unknown error occurred.";
        }
    }//close addNewMessage()
	
	public function displayList(){
		
		// Create connection
		$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
		
		$landing="";
		
		if ($connect){
		
			$sqlQuery = " SELECT m.message_id, m.message_text, m.time_stamp, u.user_name "
						."FROM messages m inner join users u " 
						."on m.user_id = u.user_id;";
			//echo 	$sqlQuery;	
			
			
			$result = mysqli_query($connect, $sqlQuery);
		
			if( $result )
			{
				while( $row = mysqli_fetch_assoc($result) )
				{
					echo  "<p> " . $row['message_id'] . "</p>\n\t\t" ;
					echo  "<p> " . $row['message_text'] . "</p>\n\t\t" ;
					echo  "<p> " . $row['time_stamp'] . "</p>\n\t\t" ;
					echo  "<p> " . $row['user_name'] . "</p>\n\t\t" . "<hr>";
				}
			}
			else
			{
				//if $result was not set display error messages from our link
				echo "<p>" . mysqli_error( $db_link ) . "</p>\n\t\t";
			}
		
		}else{
			$error = mysql_error();
			echo "Could not connect to the database. Error = $error.\n<br>";
			exit();
		}
		
		
		
		
	}//close populateMessageList
	

	
}//close Message class
?>