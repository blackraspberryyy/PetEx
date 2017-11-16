<?php
$array['user'] = array();
foreach($result as $res){
    array_push($array['user'], 
        array(
        'user_id' =>$res->user_id, 
        'user_firstname' =>$res->user_firstname,
        'user_lastname' =>$res->user_lastname,
        'user_username' =>$res->user_username,
        'user_password' =>$res->user_password,
        'user_bday' =>$res->user_bday,
        'user_sex' =>$res->user_sex,
        'user_status' =>$res->user_status,
        'user_access' =>$res->user_access,
        'user_email' =>$res->user_email,
        'user_verification_code' =>$res->user_verification_code,
        'user_isverified' =>$res->user_isverified,
        'user_picture' =>$res->user_picture,
        'user_address' =>$res->user_address,
        'user_city' =>$res->user_city,
        'user_province' =>$res->user_province,
        'user_added_at' =>$res->user_added_at,
        'user_updated_at' =>$res->user_updated_at,
    ));
}
echo json_encode($array);
