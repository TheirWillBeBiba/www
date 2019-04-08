<?php 
/** 
*распечатка массива 
**/

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}

/** 

* получение списка тестов

**/

function get_howto(){
    	global $db;
    	$query = "SELECT * FROM test";
    	$res = mysqli_query($db, $query);
    	if(!$res) return false;

    	$data = array();

    	while($row = mysqli_fetch_assoc($res)){
    		$data[] = $row;

    	}

    	return $data;

}


/**

 *получение данных теста

  **/

function get_test_data($test_id){
	if( !$test_id ) return;

	global $db;
	$query = "SELECT q.question, q.parent_test, a.id, a.answer, a.parent_question 
			FROM questions q
			LEFT JOIN answers a
				ON q.id = a.parent_question
					WHERE q.parent_test = $test_id";
		$res = mysqli_query($db, $query);
		$data = null;
		while($row = mysqli_fetch_assoc($res)){
			if( !$row['parent_question'] ) return false;
		$data[$row['parent_question']][0] = $row['question'];
		$data[$row['parent_question']][$row['id']] = $row['answer'];
		}
		return $data;

}