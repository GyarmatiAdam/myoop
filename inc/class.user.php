<?php
    $connect = mysqli_connect("localhost", "root", "", "findmygame");

class User {
//////////////check if credentials are already exists and fetch tem into array//////////////////
    function check_all_credentials($table, $val1, $val2){
            
        global $connect;
        $sql = "SELECT * FROM $table WHERE $val1 = '$val2'";
        $result = mysqli_query($connect, $sql);
        $array = array();
        $result_array = array();       
        while($array = mysqli_fetch_array($result)){
            $result_array[] = $array;
        }
        
        return $result_array;  
    }


////////////////////////////////////check if credential already exists////////////////////////
    function check_credentials($table, $val1, $val2){
        
        global $connect;
        $sql = "SELECT $val1 FROM $table WHERE $val1 = '$val2'";
        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);
        
        return $count;  
    }

////////////////////////////////////prevent from malicious injenction/////////////////////////
    function protect_input($key, $value){
        $key = trim($_POST[$value]);
        $key = strip_tags($key);
        $key = htmlspecialchars($key);
        return $key;
    }

//////////////////////select all data from one database table///////////////////////////////////
    function select_from($table){

        global $connect;
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($connect, $sql);
        $array = array();
        $result_array = array();       
        while($array = mysqli_fetch_array($result)){
            $result_array[] = $array;
        }
        
        return $result_array;       
    }

/////////////////////////////insert into one database table///////////////////////////////////
    function insert_into($table_name, $form_data){
        global $connect;
        $fields = array_keys($form_data);

        $sql = "INSERT INTO ".$table_name."
        (`".implode('`,`', $fields)."`)
        VALUES('".implode("','", $form_data)."')";

        return mysqli_query($connect, $sql);
    }

//////////////////////////////////////Pagination////////////////////////////////////////////
    //count the number of all values
    function Paginate($values,$per_page){
        $total_values = count($values);
    //get the current page
        if(isset($_GET['page'])){
        $current_page = $_GET['page'];
        }else{
    //pages start with number 1
        $current_page = 1;
        }
    //define the number of the content on each page
        $counts = ceil($total_values / $per_page);
        $param1 = ($current_page - 1) * $per_page;
        $this->data = array_slice($values,$param1,$per_page);

    //number of pages are ascending
        for($x=1; $x<= $counts; $x++){
        $numbers[] = $x;
        }
        return $numbers;
        }
    //fetch the datas that will be displayed
        function fetchResult(){
        $resultsValues = $this->data;
        return $resultsValues;
    }

/////////////////////////////////////delete from database//////////////////////////////////
    function delete_from($table, $val1, $val2){
        global $connect;
        $sql = "DELETE FROM $table WHERE $val1 = '$val2'";

        return mysqli_query($connect, $sql);
    }


///////////////////////////////////////update database data//////////////////////////////////
    function update_where($table, $data, $where_clause=''){

        global $connect;
        $whereSQL = '';
        if(!empty($where_clause))
        {
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }

        $sql = "UPDATE ".$table." SET ";
        $sets = array();
        foreach($data as $column => $value)
        {
            $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);
        $sql .= $whereSQL;

        return mysqli_query($connect, $sql);

    }

////////////////////////image upload//////////////////////////////////////////////////////
    function upload($table, $path, $val1, $val2){
        global $connect;

        if(isset($_POST['upload'])){
            
            $name = $_FILES['file']['name'];
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png","gif");
            if( in_array($imageFileType,$extensions_arr) ){
            
                $sql = "UPDATE $table SET $path='$name' WHERE $val1 = '$val2'";
                mysqli_query($connect,$sql);
            
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            }
        }//$_POST['upload'] close tag
    }

}//class User close tag
?>