<?php
$array['adoption'] = array();
foreach($result as $row){
    array_push($array['adoption'], 
        array(
           'adoption_id' => $row->adoption_id,
            'adoption.pet_id' => $row->pet_id,
            'adoption.user_id' =>$row->user_id,
            'adoption_isMissing' =>$row->adoption_isMissing,
            'adoption_adopted_at' =>$row->adoption_adopted_at,
            'user_firstname' =>$row->user_firstname,
            'user_lastname' =>$row->user_lastname,
            'user_username' =>$row->user_username,
            'user_password' =>$row->user_password,
            'user_bday' =>$row->user_bday,
            'user_sex' =>$row->user_sex,
            'user_status' =>$row->user_status,
            'user_access' =>$row->user_access,
            'user_email' =>$row->user_email,
            'user_verification_code' =>$row->user_verification_code,
            'user_isverified' =>$row->user_isverified,
            'user_contact_no' =>$row->user_contact_no,
            'user_picture' =>$row->user_picture,
            'user_address' =>$row->user_address,
            'user_city' =>$row->user_city,
            'user_province' =>$row->user_province,
            'user_added_at' =>$row->user_added_at,
            'user_updated_at' =>$row->user_updated_at,
            'pet_name' =>$row->pet_name,
            'pet_bday' =>$row->pet_bday,
            'pet_specie' =>$row->pet_specie,
            'pet_sex' =>$row->pet_sex,
            'pet_breed' =>$row->pet_breed,
            'pet_size' =>$row->pet_size,
            'pet_status' =>$row->pet_status,
            'pet_access' =>$row->pet_access,
            'pet_neutered_spayed' =>$row->pet_neutered_spayed,
            'pet_admission' =>$row->pet_admission,
            'pet_description' =>$row->pet_description,
            'pet_history' =>$row->pet_history,
            'pet_picture' =>$row->pet_picture,
            'pet_video' =>$row->pet_video,
            'pet_added_at' =>$row->pet_added_at,
            'pet_updated_at' =>$row->pet_updated_at
        ));
}
echo json_encode($array);

