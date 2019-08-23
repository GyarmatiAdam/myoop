<?php
class User {

////////////////////////////////////check if more credentials are already exists//////////////////
    function check_more_credentials($table, $val1, $val2, $val3, $val4){
            
        $connect = mysqli_connect("localhost", "root", "", "mymvc");

        $sql = "SELECT $val1, $val2, $val3 FROM $table WHERE $val1 = '$val4'";
        $result = mysqli_query($connect, $sql);
        $array = array();
        $result_array = array();       
        while($array = mysqli_fetch_array($result)){
            $result_array[] = $array;
        }
        
        return $result_array;  
    }


////////////////////////////////////check if credentials are already exists//////////////////
    function check_credentials($table, $val1, $val2){
        
        $connect = mysqli_connect("localhost", "root", "", "mymvc");

        $sql = "SELECT $val1 FROM $table WHERE $val1 = '$val2'";
        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);
        
        return $count;  
    }

////////////////////////////////////prevent from malicious injenction/////////////////////////
    function protect_input($key, $value=''){
        $key = trim($_POST[$value]);
        $key = strip_tags($key);
        $key = htmlspecialchars($key);
        return $key;
    }

/////////////////////////////////////select from database///////////////////////////////////
    function select_from($table){

        $connect = mysqli_connect("localhost", "root", "", "mymvc");

        $sql = "SELECT * FROM $table";
        $result = mysqli_query($connect, $sql);
        $array = array();
        $result_array = array();       
        while($array = mysqli_fetch_array($result)){
            $result_array[] = $array;
        }
        
        return $result_array;       
    }

/////////////////////////////////////insert into database///////////////////////////////////
    function insert_into($table_name, $form_data){
        $connect = mysqli_connect("localhost", "root", "", "mymvc");

        $fields = array_keys($form_data);

        $sql = "INSERT INTO ".$table_name."
        (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        return mysqli_query($connect, $sql);
    }

/////////////////////////////////////delete from database//////////////////////////////////
    function delete_from($table_name, $where_clause=''){
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add keyword
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
        // build the query
        $sql = "DELETE FROM ".$table_name.$whereSQL;

        // run and return the query result resource
        return mysql_query($sql);
    }


///////////////////////////////////////update database data//////////////////////////////////
    function update_where($table_name, $form_data, $where_clause=''){
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add key word
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
        // start the actual SQL statement
        $sql = "UPDATE ".$table_name." SET ";

        // loop and build the column /
        $sets = array();
        foreach($form_data as $column => $value)
        {
            $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);

        // append the where statement
        $sql .= $whereSQL;

        // run and return the query result
        return mysql_query($sql);
    }

}//class User close tag
?>