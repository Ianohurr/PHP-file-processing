<?php
//
// Run this as PHP CLI Application to see output in console.
//
// The output can be loaded in an HTML page to its rendering.
//

function oneReview($folder) {
  // Recommended: Test this function separately
  $result = $movieDir = getcwd () . '/' . $folder . '/';
	return $result;
}


function definitionList($folder) {
  // Recommended: Test this function separately
  $result = $movieDir = getcwd () . '/' . $folder . '/';
	return $result;
}

function mainPicture($folder) {
  // Recommended: Test this function separately
  $result = $movieDir = getcwd () . '/' . $folder . '/';
	return $result;
}

function getName($folder) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=file_get_contents($result . '/info.txt');
    $name=preg_split("/(?=\d)/",$info);
    $title=trim($name[0]);
    $year=trim($name[1].$name[2].$name[3].$name[4]);
    $rating=trim($name[5].$name[6]);
	return $title;
}

function getRating($folder) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=file_get_contents($result . '/info.txt');
    $name=preg_split("/(?=\d)/",$info);
    $title=trim($name[0]);
    $year=trim($name[1].$name[2].$name[3].$name[4]);
    $rating=trim($name[5].$name[6]);
	return $rating;
}

function freshRottenImage($folder) {
    
    if (getRating($folder)>='50') {
        return "fresh";
    }
    else {
        return "rotten";
    }
}

function getYear($folder) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=file_get_contents($result . '/info.txt');
    $name=preg_split("/(?=\d)/",$info);
    $title=trim($name[0]);
    $year=trim($name[1].$name[2].$name[3].$name[4]);
    $rating=trim($name[5].$name[6]);
	return "(".$year.")";
}

function review($folder,$reviewNumber) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=file($result . '/review'.$reviewNumber.'.txt');
    $review=$info[0];
    $freshRotten=strtolower($info[1]);
    $author=$info[2];
    $publisher=$info[3];
    $fullReview= "<p class=\"review\">
		<img src=\"images/$freshRotten.gif\" alt=\"$freshRotten\" /> <q>$review</q>
	</p>
	<p>
		<img src=\"images/critic.gif\" alt=\"Critic\" /> $author <br />
		$publisher
	 </p>";
    
    
   
    
    return $fullReview;
}

function overview($folder) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=file($result . '/overview.txt');
    $counter=0;
    while ($counter<sizeof($info)) {
        $currentString=$info[$counter];
        $bolded=preg_split("/[:]/",$currentString);
        echo "<dt>$bolded[0]</dt>
		<dd>
			$bolded[1]
		</dd> ";
        $counter++;
        
    }
    return null;
}


function leftCol($folder) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=scandir($result);
    $reviewNumber=0;
    $reviewNumber=sizeof($info)-5;
    $reviewNumber=round($reviewNumber/2);
    $counter=1;
    while ($counter<=$reviewNumber) {
        echo review($folder,$counter);
        $counter++;
    }
    return null;
}

function rightCol($folder) {
    $result = $movieDir = getcwd () . '/' . $folder . '/';
    $info=scandir($result);
    $reviewNumber=0;
    $reviewNumber=sizeof($info)-5;
    $counter=round($reviewNumber/2)+1;
    while ($counter<=$reviewNumber) {
        echo review($folder,$counter);
        $counter++;
    }
    return null;
}







?>