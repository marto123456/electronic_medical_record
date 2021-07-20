<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_Model { 
    
    function __construct()
    {
        parent::__construct();
    }

   function insert_health_worker()
   {
   	$page_data = array(
   		'fname'      => $this->input->post('fname'),
   		'lname'      => $this->input->post('lname'),
   		'email'      => $this->input->post('email'),
   		'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
   		'age'        => $this->input->post('age'),
   		'gender'     => $this->input->post('gender'),
   		'cadre'      => $this->input->post('cadre'),
   		'department' => $this->input->post('department'),
   	);
    $page_data['role_id']  = 3;
   	$this->db->insert('health_worker', $page_data);
   	$health_worker_id = $this->db->insert_id();

   }


   function insert_patient()
    {
            $data['email'] = html_escape($this->input->post('email'));
            $data['fname'] = html_escape($this->input->post('fname'));
            $data['lname'] = html_escape($this->input->post('lname'));
            
            $data['age'] = html_escape($this->input->post('age'));
            $data['gender'] = html_escape($this->input->post('gender'));
            $data['height'] = html_escape($this->input->post('height'));
            $data['weight'] = html_escape($this->input->post('weight'));
            $data['bmi'] = html_escape($this->input->post('bmi'));
            $data['lga'] = html_escape($this->input->post('lga'));
            $data['ward'] = html_escape($this->input->post('ward'));

            //Encrypt the users password
            $data['password'] = password_hash(($this->input->post('password')), PASSWORD_DEFAULT);
            if (! $data['password']) {
                return false;
            }
           
            $data['login_status'] = 0;
            $data['verification_code'] = md5(rand(100000, 500000));
            $data['email_verified'] = 0;
            $data['role_id']  = 2;

            $user = $this->db->insert('users', $data);
            

            //get the id of the inserted user
            $user_id = $this->db->insert_id();

                $img = $this->input->post('image');
                $folderPath = "uploads/users_image";
              
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
              
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $user_id . '.png';
              
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
              
                print_r($fileName);                                                                                          
             $receiverEmail =  $data['email'];
             $subject = 'Confirm Your Email Address';
             $message = 'Click on the link below to confirm your email address';
             $link = '<a href="' . base_url().'register/user_verification/'.$data['verification_code'].'">click here</a>';
            
                
             $this->load->library('phpmailer_lib');
             $mail = $this->phpmailer_lib->load();
                 //SMTP CONFIGURATIONS
             $mail->isSMTP();
             $mail->Host = '';
               $mail->SMTPAuth = true;
               // $mail->Username = '';
               // $mail->Password = '';

               $mail->SMTPOptions = array(
                 'ssl' => array(
                 'verify_peer' => false,
                 'verify_peer_name' => false,
                 'allow_self_signed' => true
                 )
               );
               $mail->SMTPSecure = "tls";
               $mail->Port = 587;

               $mail->setFrom('support@topnetworkguide.com', 'TNG');
               $mail->addReplyTo('support@topnetworkguide.com', 'TNG');

           //    //Reciever Address
               $mail->addAddress($data['email']);

               $mail->Subject = $subject;
               $mail->isHTML(true);

               $mailContent = '<div class="card card-header">Contact Information</div><br>
               <div class="card-body"><br>
               Email: ' .$receiverEmail.'<br>
               Subject: '.$subject.'<br>
               Content: '.$message.' <br>
               '.$link.'</div>';


               $mail->Body = $mailContent;

               //Send Email

               if (!$mail->send()) {
                 echo 'mail error: '.$mail->ErrorInfo;
               }else{
                 echo 'message sent';
               }

              ;
    }
    
}
