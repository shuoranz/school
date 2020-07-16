<?php

//Helper Functions for Formatting

//URL FORMAT
function urlFormat($str){
    //Strip out all whitespaces
    $str = preg_replace('/\s*/','', $str);
    //Convert the string to lowercase
    $str = strtolower($str);
    //URL Encode
    $str = urlencode ($str);
    return $str;
}

//Format date
function formatDate($date) {
    $date = date("F j, Y, g:i a",strtotime($date));
    return $date;
}

//Add classname active if the category is active
function is_active($category){
    if(isset($_GET['category'])){
        if($_GET['category'] == $category){
            return 'active';
        } else {
            return '';
        }
    } else {
        if($category == null){
        return 'active';
        }
    }
}
function removeEmptyLinesAndReturnHtml($html) {
    $html = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$html);
	$html = str_replace('<p></p>', '', $html);
    $html = str_replace('<h1></h1>','', $html);
    $html = str_replace('<h2></h2>','', $html);
    $html = str_replace('<h3></h3>','', $html);
	$html = "<html>
				<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
				<title>test</title>
				</head>
				<body>" . $html . 
			   "</body>
			</html>";
	return $html;
}
function copyAndSetPageURI($parameterArr, $pageNum) {
    $result = "?";
    foreach($parameterArr as $name=>$value) {
        if (strcmp($name, "p") != 0) {
            $result = $result . $name . "=" . $value . "&";
        }
    }
    $result = $result . "p=" . $pageNum;
    return $result; 
}
?>